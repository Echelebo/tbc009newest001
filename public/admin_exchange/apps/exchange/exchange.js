/*
 * ==========================================================
 * BOXCOIN CRYPTO EXCHANGE ADDON SCRIPT
 * ==========================================================
 *
 * © 2022-2023 boxcoin.dev. All rights reserved.
 * 
 */

'use strict';
(function () {
    let _ = window._query;
    let exchange;
    let timeout;
    let quote;
    let quote_update_time = 10;
    let quote_update_labels;
    let quote_timeout;
    let quote_cancelled;
    let is_loading = false;
    let panels = {};
    let active_panel_name = 'start';
    let payment_interval;
    let saved_addresses = storage('bxc-saved-addresses', -1, {});
    let saved_payment_details = storage('bxc-payment-details', -1, {});
    let complycube;
    let complycube_interval;
    let complycube_loading = false;
    let email_verification_code = false;
    let sending_fiat = false;
    let enter_key_ignore = false;

    var BXCExchange = {

        quotation: function () {
            clearTimeout(quote_timeout);
            quote_timeout = setTimeout(() => {
                let start = active_panel_name == 'start';
                let input_send = exchange.find('#bxc-send-amount');
                let input_get = exchange.find('#bxc-get-amount');
                let send_element = input_send.next();
                let get_element = input_get.next();
                let send_code = send_element.data('value').toUpperCase();
                let send_amount = parseFloat(input_send.val());
                let button = exchange.find('#bxc-btn-exchange-' + (start ? 1 : 3));
                let containers = exchange.find(start ? '#bxc-summary' : '#bxc-summary-payment');
                let get_code = exchange.find('#bxc-get .bxc-1 [data-value]').data('value');
                button.addClass('bxc-disabled');
                if (!send_amount) return BXCExchange.error(true);
                is_loading = true;
                ajax('exchange-quotation', { send_amount: send_amount, send_code: send_code, get_code: get_code }, (response) => {
                    is_loading = false;
                    quote_update_time = 10;
                    send_code = BOXCoin.baseCode(send_code);
                    BXCExchange.error(response.get_amount < 0 ? bxc_('The amount is too low.') : (response.error ? (response.error == 'amount-less-than-min' ? `${bxc_('The minimum amount is')} ${response.send_min_amount} ${send_code}.` : (response.error == 'amount-exceeds-max' ? `${bxc_('The maximum amount is')} ${response.send_max_amount} ${send_code}.` : response.error)) : ''));
                    if (response.error || response.get_amount < 0) return;
                    let rows = [[response.get_amount + '<i> @ ' + response.unit_rate + ' ' + send_code + '</i>', response.send_amount_less_fees + ' ' + send_code], [bxc_('Network fee') + ' <i class="bxc-icon-help bxc-toolip-cnt"><span class="bxc-toolip">' + bxc_('The blockchain fee') + '</span></i>', response.fee + ' ' + send_code], [bxc_('Processing fee') + ' <i class="bxc-icon-help bxc-toolip-cnt"><span class="bxc-toolip">' + bxc_('The fee charged by us') + '</span></i>', response.processing_fee + ' ' + send_code]];
                    let code = '';
                    let get_address = quote && quote.get_address && quote.get_code === get_code ? quote.get_address : '';
                    let get_payment_details = quote && quote.get_payment_details ? quote.get_payment_details : false;
                    for (var i = 0; i < rows.length; i++) {
                        code += `<span class="bxc-flex"><span>${rows[i][0]}</span><span>${rows[i][1]}</span></span>`;
                    }
                    containers.find('.bxc-2').html(code);
                    input_get.val(response.get_amount);
                    containers.find('.bxc-1').html(bxc_('You get {R} for {R2}').replace('{R}', '<b>' + response.get_amount + ' ' + get_code.toUpperCase() + '</b>').replace('{R2}', '<b>' + send_amount + ' ' + send_code + '</b>'));
                    activate(exchange.find(start ? '#bxc-summary, .bxc-title-summary-start' : '#bxc-summary-payment, .bxc-title-summary-payment'), true);
                    quote = response;
                    quote.get_network = get_element.data('network');
                    quote.get_name = get_element.data('name');
                    quote.get_image = get_element.find('img').attr('src');
                    quote.send_network = send_element.data('network');
                    quote.send_name = send_element.data('name');
                    quote.send_image = send_element.find('img').attr('src');
                    quote.is_send_crypto = send_element.data('crypto') ? true : false;
                    quote.get_address = get_address;
                    quote.get_payment_details = get_payment_details;
                    button.removeClass('bxc-disabled');
                    if (active_panel_name == 'start') {
                        storage('bxc-quote', quote);
                    }
                });
            }, 500);
        },

        error: function (message) {
            let selectors = { start: ['#bxc-error-pay', '#bxc-send .bxc-1'], address: ['#bxc-error-address', '#bxc-get-address'] }[active_panel_name];
            if (selectors) {
                if (message && active_panel_name == 'start') {
                    panels.start.find('#bxc-get-amount').val('');
                    activate(panels.start.find('#bxc-summary, .bxc-title-summary-start'), false);
                }
                if (message === true) message = '';
                exchange.find(selectors[0]).html(bxc_(message));
                exchange.find(selectors[1]).setClass('bxc-error', message);
            }
        },

        validateAddress: function (address, cryptocurrency_code, onSuccess) {
            ajax('validate-address', { address: address, cryptocurrency_code: cryptocurrency_code }, (response) => {
                onSuccess(response);
            });
        },

        verifyPayment: function (quote) {
            this.appendOrderID(panels.processing);
            show_panel('processing');
            payment_interval = setInterval(() => {
                if (!is_loading) {
                    is_loading = true;
                    BXCExchange.isPaymentCompleted(quote.external_reference, (response) => {
                        is_loading = false;
                        if (response === true) {
                            clearInterval(payment_interval);
                            BXCExchange.finalize();
                            if (!BOXCoin.isFiat(quote.get_code)) {
                                panels.processing.find('.bxc-title').html(bxc_('We are sending {R} to your address...').replace('{R}', quote.get_code.toUpperCase()));
                            }
                        }
                    });
                }
            }, 1000);
        },

        isPaymentCompleted: function (external_reference_base64, onSuccess) {
            ajax('exchange-is-payment-completed', { external_reference_base64: external_reference_base64 }, (response) => {
                onSuccess(response);
            });
        },

        finalize: function () {
            ajax('exchange-finalize', {
                external_reference_base64: quote.external_reference,
                identity: storage('bxc-identity'),
                user_payment_details: quote.get_payment_details ? quote.get_payment_details : false
            }, (response) => {
                setTimeout(() => {
                    let finish_text = panels.finish.find('#bxc-finish-text');
                    let finish_link = panels.finish.find('#bxc-transaction-link');
                    if (response[0]) {
                        if (response[2] == 'manual') {
                            finish_text.removeClass('bxc-title').html(`<div class="bxc-title">${bxc_('Payment confirmed')}</div><div class="bxc-text bxc-text-manual">${BXC_SETTINGS.exchange.texts[0].replace('{amount}', quote.get_amount + ' ' + quote.get_code.toUpperCase())}<br>${quote.get_payment_details.details.replace(/(?:\r\n|\r|\n)/g, '<br>')}<br>${bxc_('Payment method')}: ${quote.get_payment_details.method_name}</div>`);
                            finish_link.remove();
                        } else {
                            finish_text.html(bxc_('We have sent {R} to {R2}').replace('{R}', '<b>' + response[1] + ' ' + quote.get_code.toUpperCase() + '</b>').replace('{R2}', '<b>' + quote.get_address.trim() + '</b>'));
                            payment_interval = setInterval(() => {
                                if (!is_loading) {
                                    is_loading = true;
                                    ajax('get-explorer-link', { hash: response[2], cryptocurrency_code: quote.get_code }, (response) => {
                                        is_loading = false;
                                        if (response !== false) {
                                            clearInterval(payment_interval);
                                            finish_link.attr('href', response).attr('target', '_blank').removeClass('bxc-loading');
                                        }
                                    });
                                }
                            }, 1000);
                        }
                    } else {
                        finish_text.html(response[1]);
                        finish_link.remove();
                        panels.finish.find('.bxc-icon-check').attr('class', 'bxc-icon-close');
                    }
                    this.appendOrderID(panels.finish);
                    show_panel('finish');
                    quote.external_reference = false;
                    storage('bxc-quote', quote);
                }, 3000);
            });
        },

        appendOrderID: function (panel) {
            panel = panel.find('.bxc-footer');
            if (!panel.html().includes(quote.id)) {
                panel.append('<br />' + bxc_('Your Order ID is') + ' ' + quote.id + '.');
            }
        }
    }

    window.BXCExchange = BXCExchange;

    function activate(element, activate = true) {
        return BOXCoin.activate(element, activate);
    }

    function show_panel(name) {
        exchange.find('> .bxc-panel').removeClass('bxc-active');
        if (name == 'address' && storage('bxc-quote') && BOXCoin.isFiat(storage('bxc-quote').get_code)) {
            name = 'address_fiat';
        }
        activate(panels[name]);
        active_panel_name = name;
    }

    function bxc_(text) {
        return BXC_TRANSLATIONS && text in BXC_TRANSLATIONS ? BXC_TRANSLATIONS[text] : text;
    }

    function ajax(function_name, data = {}, onSuccess = false) {
        return BOXCoin.ajax(function_name, data, onSuccess);
    }

    function storage(name, value = -1, default_value = false) {
        if (value === -1) {
            let value = localStorage.getItem(name);
            return value ? JSON.parse(value) : default_value;
        }
        localStorage.setItem(name, JSON.stringify(value));
    }

    function select_click(element) {
        if (!element.e.length) return;
        let select = element.closest('.bxc-input-select');
        let item = select.find('.bxc-1 > div');
        let value = element.data('value');
        BXCExchange.error('');
        item.find('img').attr('src', element.find('img').attr('src')).attr('alt', value);
        item.find('span').html(BOXCoin.baseCode(value));
        item.data('value', value).data('crypto', element.data('crypto')).data('network', element.data('network')).data('name', element.data('name'));
        activate(element.closest('.bxc-2'), false);
        BXCExchange.quotation();
        activate(exchange.find('#bxc-invert'), sending_fiat || (element.data('crypto') && exchange.find('#bxc-send .bxc-1 [data-crypto]').e.length && exchange.find(`#bxc-get [data-value="${value}"]`).e.length));
    }

    function complycube_create(button, user_details) {
        ajax('complycube', { first_name: user_details.first_name, last_name: user_details.last_name, email: user_details.email }, (response) => {
            if (response[0]) {
                complycube = ComplyCube.mount({
                    token: response[1],
                    onComplete: (data) => {
                        if (data && data.documentCapture && data.faceCapture) {
                            ajax('complycube-create-check', { client_id: response[2], live_photo_id: data.faceCapture.livePhotoId, document_id: data.documentCapture.documentId, type: 'identity_check' }, (response) => {
                                complycube.updateSettings({ isModalOpen: false });
                                if (response[0]) {
                                    storage('bxc-identity', { id: response[1].id, email: user_details.email, first_name: user_details.first_name, last_name: user_details.last_name });
                                    complycube_check(response[1].id, user_details.email);
                                } else {
                                    exchange.find('#bxc-btn-exchange-identity-text').html(JSON.stringify(response[1]));
                                    console.error(JSON.response);
                                    BOXCoin.loading(button, false);
                                }
                            });
                        }
                    }
                });
            } else {
                console.error(response);
                return false;
            }
        });
        return true;
    }

    function complycube_check(check_id, email) {
        complycube_interval = setInterval(() => {
            if (!complycube_loading) {
                complycube_loading = true;
                ajax('complycube-check', { check_id: check_id, email: email }, (response) => {
                    complycube_loading = false;
                    if (response === true || !response[0]) {
                        if (response === true) {
                            show_panel('address');
                        } else {
                            exchange.find('#bxc-btn-exchange-identity-text').html(JSON.stringify(response[1]));
                        }
                        clearInterval(complycube_interval);
                        BOXCoin.loading(exchange.find('#bxc-btn-exchange-identity'), false);
                    }
                });
            }
        }, 2000);
    }

    // Init
    exchange = _('#boxcoin-exchange');
    if (!exchange.e.length) return;
    sending_fiat = exchange.find('#bxc-get [data-currency]').e.length > 0;
    quote_update_labels = exchange.find('#bxc-quote-update');
    quote = storage('bxc-quote');
    exchange.find('> .bxc-panel').e.forEach((element) => {
        panels[_(element).attr('id').replace('bxc-panel-', '').replace('-', '_')] = _(element);
    });
    let reload = BOXCoin.getURL('transaction_id') && (!quote || !quote.external_reference);
    let url = window.location.href;
    if (reload) {
        url = url.substr(0, url.indexOf('transaction_id'));
        document.location = url.slice(-1) == '?' ? url.slice(0, -1) : url;
    }
    if (panels.identity) {
        _.load('https://assets.complycube.com/web-sdk/v1/complycube.min.js');
        _.load('https://assets.complycube.com/web-sdk/v1/style.css', false);
    }
    if (quote) {
        if (quote.verify_payment && quote.external_reference && !reload && BOXCoin.getURL('payment_status') != 'cancelled') {
            BXCExchange.verifyPayment(quote);
        } else {
            window.history.pushState({}, document.title, url.replace('?payment_status=cancelled', '').replace('payment_status=cancelled', ''));
            exchange.find('#bxc-send-amount').val(quote.send_amount);
            select_click(exchange.find(`#bxc-send .bxc-2 [data-value="${quote.send_code}"]`));
            select_click(exchange.find(`#bxc-get .bxc-2 [data-value="${quote.get_code}"]`));
            BXCExchange.quotation();
        }
    }

    exchange.on('input', '.bxc-input-select .bxc-search-input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            let select = _(this.parentNode.parentNode);
            let search = _(this).val().toLowerCase();
            let all_hidden = [true, true];
            let select_items = select.find('.bxc-2-2 .bxc-select-ul > div');
            let select_titles = select.find('.bxc-2-2 > span');
            if (search) {
                select_items.addClass('bxc-hidden');
                for (var i = 0; i < select_items.e.length; i++) {
                    let item = _(select_items.e[i]);
                    if (item.e[0].textContent.toLowerCase().includes(search) && !item.hasClass('bxc-hidden-select')) {
                        item.removeClass('bxc-hidden');
                        all_hidden[item.data('currency') ? 1 : 0] = false;
                    }
                }
            } else {
                all_hidden = [false, false];
                select_items.removeClass('bxc-hidden');
            }
            if (select_titles.e.length) {
                _(select_titles.e[0]).setClass('bxc-hidden', all_hidden[0]);
                _(select_titles.e[1]).setClass('bxc-hidden', all_hidden[1]);
            }
        }, 200);
    });

    exchange.on('click', '.bxc-input-select .bxc-1 > div', function () {
        let select = _(this.closest('.bxc-input-select'));
        let input = select.find('.bxc-search-input');
        let other_select = exchange.find(select.attr('id') === 'bxc-send' ? '#bxc-get' : '#bxc-send');
        let other_value = other_select.find('.bxc-1 > [data-value]').data('value');
        exchange.find('.bxc-input-select .bxc-select-ul > div').removeClass('bxc-hidden-select');
        select.find(`.bxc-2-2 .bxc-select-ul > [data-value="${other_value}"]`).addClass('bxc-hidden-select');
        select.find('.bxc-title-currencies').setClass('bxc-hidden-fiat', BOXCoin.isFiat(other_value));
        input.val('');
        setTimeout(() => { input.e[0].focus() }, 100);
        input.e[0].dispatchEvent(new Event('input', { bubbles: true }));
        activate(exchange.find('.bxc-input-select .bxc-2'), false);
        activate(this.parentNode.nextElementSibling);
    });

    exchange.on('click', '.bxc-input-select .bxc-2-1 .bxc-icon-close', function () {
        activate(this.parentNode.parentNode, false);
    });

    exchange.on('click', '.bxc-input-select .bxc-select-ul > div', function () {
        select_click(_(this));
    });

    exchange.on('click', '.bxc-summary', function () {
        _(this).toggleClass('bxc-open');
    });

    exchange.on('input', '#bxc-send-amount', function () {
        BXCExchange.error('');
        BXCExchange.quotation();
        exchange.find('#bxc-get-amount').val('');
    });

    exchange.on('click', '#bxc-invert', function () {
        if (is_loading) return;
        let first = [exchange.find('#bxc-send-amount'), exchange.find('#bxc-send .bxc-1 > div')];
        let second = [exchange.find('#bxc-get-amount'), exchange.find('#bxc-get .bxc-1 > div')];
        let first_values = [first[0].val(), first[1].e[0].outerHTML];
        is_loading = true;
        first[0].val(second[0].val());
        first[1].replace(second[1].e[0].outerHTML);
        second[0].val('');
        second[1].replace(first_values[1]);
        activate(exchange.find('.bxc-summary, .bxc-title-summary'), false);
        clearTimeout(timeout);
        timeout = setTimeout(() => { BXCExchange.quotation() }, 500);
    });

    setInterval(() => {
        if (is_loading) return;
        if (active_panel_name == 'start' || active_panel_name == 'payment') {
            quote_update_time--;
            if (quote_update_time < 1) BXCExchange.quotation();
            if (quote_update_time >= 0) quote_update_labels.i(active_panel_name == 'start' ? 0 : 1).html('<i class="bxc-icon-clock"></i>' + bxc_('Quote updates in') + ' ' + quote_update_time + 's');
        }
    }, 1000);

    exchange.on('click', '#bxc-btn-exchange-1', function () {
        if (is_loading || _(this).hasClass('bxc-disabled')) return;
        let name = quote.get_name + (quote.get_network && quote.get_network != quote.get_code ? ' ' + bxc_('on') + ' ' + quote.get_network.toUpperCase() + ' ' + bxc_('network') : '');
        let cryptocurrency_code = quote.get_code.toUpperCase();
        let input = panels.address.find('#bxc-get-address');
        panels.address.find('.bxc-title').html(cryptocurrency_code + ' • ' + name + ' ' + bxc_('wallet address') + '<i data-back="start" class="bxc-icon-arrow-left"></i>');
        panels.address.find('.bxc-text').html(bxc_('We will send the amount to this address. Use a wallet which supports {R} and make sure the address is correct, to avoid losing your {R2}.').replace(/{R}/g, name).replace('{R2}', cryptocurrency_code));
        input.find('img').attr('src', quote.get_image);
        input.find('input').val(quote.get_address);
        panels.address.data('cryptocurrency-code', cryptocurrency_code);
        if (saved_addresses[quote.get_code]) {
            exchange.find('#bxc-get-address input').val(saved_addresses[quote.get_code]);
        }
        if (quote.get_address || saved_addresses[quote.get_code]) {
            input.find('input').e[0].dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (saved_payment_details && panels.address_fiat) {
            panels.address_fiat.find('#bxc-payment-method-send').val(saved_payment_details.method);
            panels.address_fiat.find('#bxc-payment-details-send').val(saved_payment_details.details);
            panels.address_fiat.find('#bxc-btn-exchange-2-fiat').removeClass('bxc-disabled');
        }
        if (panels.identity) {
            let identity = storage('bxc-identity');
            if (identity) {
                exchange.find('#bxc-first-name input').val(identity.first_name);
                exchange.find('#bxc-last-name input').val(identity.last_name);
                exchange.find('#bxc-email input').val(identity.email);
            }
            show_panel('identity');
        } else {
            show_panel('address');
        }
        storage('bxc-quote', quote);
    });

    exchange.on('click', '#bxc-btn-exchange-2, #bxc-btn-exchange-2-fiat', function () {
        if (is_loading || _(this).hasClass('bxc-disabled')) return;
        quote.get_address = exchange.find('#bxc-get-address input').val();
        let is_fiat = _(this).attr('id').includes('fiat');
        let input = panels.payment.find('#bxc-payment-address' + (is_fiat ? '-fiat' : ''));
        if (is_fiat) {
            let select = panels.address_fiat.find('#bxc-payment-method-send');
            let details = { method: select.val(), method_name: select.find(`[value="${select.val()}"]`).html(), details: panels.address_fiat.find('#bxc-payment-details-send').val().trim() };
            quote.get_payment_details = details
            input.html(`${details.details.replace(/(?:\r\n|\r|\n)/g, '<br>')}<br>${bxc_('Payment method')}: ${details.method_name}`);
            storage('bxc-payment-details', details);
        } else {
            input.find('img').attr('src', quote.get_image);
            input.find('input').val(quote.get_address);
            storage('bxc-payment-details', false);
            quote.get_payment_details = false
        }
        activate(panels.payment.find('#bxc-payment-address' + (is_fiat ? '' : '-fiat')), false);
        activate(input);
        BXCExchange.quotation();
        storage('bxc-quote', quote);
        saved_addresses[quote.get_code] = quote.get_address;
        storage('bxc-saved-addresses', saved_addresses);
        if (quote.is_send_crypto) {
            let payment_method = panels.payment.find('[data-payment-method="crypto"]');
            let name = quote.send_name + (quote.send_network && quote.send_network != quote.send_code ? ' ' + bxc_('on') + ' ' + quote.send_network.toUpperCase() + ' ' + bxc_('network') : '');
            payment_method.find('div').html(name);
            payment_method.find('img').attr('src', quote.send_image).attr('alt', quote.send_code);
            activate(panels.payment.find('.bxc-paymet-method .bxc-active'), false);
            activate(payment_method);
        }
        panels.payment.find('#bxc-payment-address-title').html(bxc_('Sending {R} to').replace('{R}', quote.get_code.toUpperCase()));
        panels.payment.find('.bxc-paymet-method').data('crypto', quote.is_send_crypto ? 'true' : 'false');
        show_panel('payment');
    });

    exchange.on('click', '#bxc-btn-exchange-3', function () {
        if (is_loading || _(this).hasClass('bxc-disabled')) return;
        let id = Math.floor(Date.now());
        let note = bxc_('Exchange ID') + ' ' + id + '. ' + bxc_('Exchange of {R} for {R2}.').replace('{R}', quote.send_amount + ' ' + quote.send_code.toUpperCase()).replace('{R2}', quote.get_amount + ' ' + quote.get_code.toUpperCase());
        let external_reference = window.btoa(id + '|' + quote.get_code + '|' + quote.get_address);
        quote.payment_method = panels.payment.find('[data-payment-method].bxc-active').data('payment-method');
        quote.external_reference = external_reference;
        quote.verify_payment = true;
        quote.id = id;
        if (quote.payment_method == 'manual') {
            if (BOXCoin.loading(this)) {
                return;
            }
            quote.verify_payment = false;
            ajax('exchange-finalize-manual', {
                amount: quote.send_amount,
                cryptocurrency_code: quote.get_code,
                currency_code: quote.send_code,
                external_reference: external_reference,
                note: note,
                identity: storage('bxc-identity')
            }, (response) => {
                BOXCoin.loading(this, false);
                if (response[0] == 'error') {
                    error_box.html(bxc_('Something went wrong. Please try again or select another cryptocurrency.'));
                    return BOXCoin.checkout.cancelTransaction(true);
                } else {
                    let text = panels.finish_manual.find('#bxc-panel-finish-manual .bxc-text');
                    text.html(text.html().replaceAll('{amount}', quote.send_amount + ' ' + quote.send_code.toUpperCase()).replaceAll('{order_id}', `<b>${id}</b>`));
                    show_panel('finish_manual');
                }
            });
        } else {
            storage('bxc-quote', quote);
            document.location = `${BXC_URL}${BXC_SETTINGS.exchange.url_rewrite_checkout ? BXC_SETTINGS.exchange.url_rewrite_checkout : 'pay.php?checkout_id='}custom-${id}${BXC_SETTINGS.exchange.url_rewrite_checkout ? '?' : '&'}price=${quote.send_amount}&currency=${quote.send_code}&redirect=${encodeURIComponent(document.location.href)}&external-reference=${external_reference}&note=${encodeURIComponent(note)}&pay=${quote.is_send_crypto ? quote.send_code : quote.payment_method}&type=3`;
        }
    });

    exchange.on('click', '#bxc-btn-exchange-identity', function () {
        if (BOXCoin.loading(this)) {
            return;
        }
        let error = exchange.find('#bxc-error-identity');
        let is_error = false;
        let identity = storage('bxc-identity');
        let identity_type = BXC_SETTINGS.exchange.identity_type;
        let details = {
            first_name: exchange.find('#bxc-first-name input').val().trim(),
            last_name: exchange.find('#bxc-last-name input').val().trim(),
            email: exchange.find('#bxc-email input').val().trim(),
        };
        error.html('');
        if (details.email && (identity_type == 'email' || (details.first_name && details.last_name))) {
            if (!details.email.includes('@') || !details.email.includes('.') || /;|:|\/|\\|,|#|"|!|=|\+|\*|{|}|[|]|£|\$|€|~|'|>|<|\^|&/.test(details.email)) {
                error.html('The email address provided is invalid.');
                is_error = true;
            } else {
                let is_complycube = identity_type == 'complycube';
                if (is_complycube && identity && identity.id && identity.email == details.email && identity.first_name == details.first_name && identity.last_name == details.last_name) {
                    return complycube_check(identity.id, identity.email);
                }
                if (BXC_SETTINGS.exchange.email_verification) {
                    let email_verification_code_user = exchange.find('#bxc-email-verification-code input').val().trim();
                    if (email_verification_code && !email_verification_code_user) {
                        is_error = true;
                    } else {
                        ajax('email-verification', { email: details.email, saved_email: storage('bxc-saved-email'), verification_code: [email_verification_code_user, email_verification_code[0], email_verification_code[1]] }, (response) => {
                            if (response === true) {
                                if (is_complycube) {
                                    complycube_create(this, details);
                                } else {
                                    show_panel('address');
                                }
                                storage('bxc-identity', { email: details.email, first_name: details.first_name, last_name: details.last_name });
                            } else if (response[0] === true) {
                                email_verification_code = [response[1], response[2]];
                                exchange.find('#bxc-email-verification').removeClass('bxc-hidden');
                                storage('bxc-saved-email', response[2]);
                            } else if (email_verification_code && email_verification_code_user) {
                                error.html('The verification code is invalid.');
                            } else {
                                error.html(response[1] ? response[1] : 'Unknow error.');
                            }
                            BOXCoin.loading(this, false);
                        });
                    }
                } else {
                    if (is_complycube) {
                        complycube_create(this, details);
                    } else {
                        show_panel('address');
                    }
                    storage('bxc-identity', { email: details.email, first_name: details.first_name, last_name: details.last_name });
                    BOXCoin.loading(this, false);
                }
            }
        } else {
            is_error = true;
            error.html('All fields are required.');
        }
        if (is_error) {
            BOXCoin.loading(this, false);
        }
    });

    if (panels.identity) {
        panels.identity.on('input', '#bxc-email input', function () {
            email_verification_code = false;
        });
    }

    exchange.on('click', '#bxc-cancel-verify-payment', function () {
        let external_reference = quote.external_reference;
        quote_cancelled = quote;
        panels.finish.find('#bxc-finish-text').html(`${bxc_('The order has been canceled. If you have already sent the payment, please reactivate the order and await its completion.')}<div class="bxc-two-buttons"><div id="bxc-activate-verify-payment" class="bxc-link bxc-underline">${bxc_('Activate the order again')}</div><div id="bxc-reload" class="bxc-link bxc-underline">${bxc_('Start again')}</div></div>`);
        panels.finish.find('#bxc-transaction-link').remove();
        panels.finish.find('.bxc-icon-check').attr('class', 'bxc-icon-close');
        BXCExchange.appendOrderID(panels.finish);
        show_panel('finish');
        quote.external_reference = false;
        storage('bxc-quote', quote);
        quote.external_reference = external_reference;
    });

    exchange.on('click', '#bxc-activate-verify-payment', function () {
        quote = quote_cancelled;
        storage('bxc-quote', quote);
        BXCExchange.verifyPayment(quote);
    });

    exchange.on('click', '#bxc-reload', function () {
        location.reload();
    });

    exchange.on('click', '[data-back]', function () {
        if (!BOXCoin.loading(panels[active_panel_name].find('.bxc-btn'), 'check')) {
            let name = _(this).data('back');
            show_panel(name);
        }
    });

    exchange.on('input', '#bxc-get-address input', function () {
        let message = 'Sorry, you have entered an invalid wallet address.';
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            let address = _(this).val();
            let cryptocurrency_code = panels.address.data('cryptocurrency-code');
            if (address.length < 10) {
                BXCExchange.error(message);
            } else {
                is_loading = true;
                BXCExchange.validateAddress(address, cryptocurrency_code, (response) => {
                    if (BXC_SETTINGS.exchange['testnet_' + BOXCoin.network(cryptocurrency_code, 'code')]) {
                        response = true;
                    }
                    is_loading = false;
                    BXCExchange.error(response === true ? '' : message);
                    exchange.find('#bxc-btn-exchange-2').setClass('bxc-disabled', response !== true);
                });
            }
        }, 500);
    });

    exchange.on('input', '#bxc-payment-details-send', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            exchange.find('#bxc-btn-exchange-2-fiat').setClass('bxc-disabled', _(this).val().length < 10);
        }, 500);
    });

    exchange.on('focusout', 'input, textarea', function () {
        enter_key_ignore = false;
    });

    exchange.on('focusin', 'input, textarea', function () {
        enter_key_ignore = true;
    });

    exchange.on('click', '[data-payment-method]', function () {
        activate(_(this).siblings(), false);
        activate(this);
    });

    window.addEventListener('keydown', function (e) {
        if ([32, 13].includes(e.keyCode) && !enter_key_ignore) {
            panels[active_panel_name].find('.bxc-btn-main').e[0].click();
        }
    })
}());