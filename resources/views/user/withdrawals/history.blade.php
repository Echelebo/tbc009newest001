@extends('layouts.user')

@section('contents')
    <div class="w-full p-3" id="pageContent">
        <div class="w-full lg:flex lg:gap-3" id="refresh">

            <div class="w-full ">
                <div class="w-full p-5 mb-5 rounded-lg transition-all rescron-card" id="withdrawals">
                    <h3 class="capitalize  font-extrabold "><span class="border-b-2">Withdrawal History</span>
                    </h3>

                    <div class="w-full">


                        <div class="grid grid-cols-1 gap-3 mt-5">
                            <div class="flex justify-end mb-5">
                                <div class="flex justify-end items-center  mb-2 mt-5">
                                    <div class="relative">

                                        <span class="theme1-input-icon material-icons">
                                            search
                                        </span>
                                        <input type="text" placeholder="Txn Ref" id="search-withdrawal-input"
                                            class="theme1-text-input rounded-0" value="{{ request()->s }}">
                                        <label for="search-withdrawal-input" class="placeholder-label text-white px-2">Txn
                                            Ref
                                        </label>

                                    </div>
                                    <div class="simple-pagination" data-paginator="withdrawals">
                                        <a id="search-withdrawal-button"
                                            class="paginator-link px-3 text-white py-2 bg-blue-500 hover:scale-110 transition-all"
                                            data-link="{{ route('user.withdrawals.index') }}" href="">Search</a>
                                    </div>
                                </div>
                            </div>
                            @forelse ($withdrawals as $withdrawal)
                                <div
                                    class="w-full flex justify-between items-center p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer">
                                    <div class="">
                                        <p class="local-time">{{ date('d-m-y H:i:s', strtotime($withdrawal->created_at)) }}
                                        </p>
                                        <p class="font-bold text-mono">
                                            {{ formatAmount($withdrawal->amount - $withdrawal->fee) }}</p>
                                        <p class="flex space-x-1"><img class="w-5 h-5"
                                                src="{{ 'https://nowpayments.io' . $withdrawal->depositCoin->logo_url }}"
                                                alt="">
                                            <span>{{ $withdrawal->depositCoin->name }}</span>
                                        </p>
                                    </div>
                                    <div class="break-all">
                                        <p class="flex justify-end items-center space-x-1">
                                            @if ($withdrawal->status == 'pending')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                    fill="currentColor" class="bi bi-patch-exclamation-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                <span class="text-white uppercase text-xs">{{ $withdrawal->status }}</span>
                                            @elseif ($withdrawal->status == 'approved')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500"
                                                    fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                </svg>
                                                <span
                                                    class="text-green-500 uppercase text-xs">{{ $withdrawal->status }}</span>
                                            @elseif ($withdrawal->status == 'rejected' || $withdrawal->status == 'failed' || $withdrawal->status == 'refunded')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500"
                                                    fill="currentColor" class="bi bi-patch-exclamation-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                <span
                                                    class="text-red-500 uppercase text-xs">{{ $withdrawal->status }}</span>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500"
                                                    fill="currentColor" class="bi bi-patch-exclamation-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                <span
                                                    class="text-orange-500 uppercase text-xs">{{ $withdrawal->status }}</span>
                                            @endif
                                        </p>
                                        <p class="flex justify-end flex items-center space-x-1">
                                            <span>{{ $withdrawal->converted_amount . ' ' . $withdrawal->depositCoin->code }}</span>
                                            <span class="text-xs text-orange-500">
                                                /{{ $withdrawal->depositCoin->network ?? $withdrawal->depositCoin->code }}</span>
                                        </p>
                                        <p class="flex justify-end clipboard cursor-pointer text-xs break-all"
                                            data-copy="{{ $withdrawal->wallet_address }}">
                                            {{-- <button data-link=""
                                                class="view-single-withdrawal flex space-x-1 items-center text-white  hover:scale-110 transition-all hover:text-white bg-blue-500 px-1 rounded-full text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                                <span>View</span>
                                            </button> --}}
                                            {{ $withdrawal->wallet_address }}
                                        </p>

                                        <div class="w-full flex items-center justify-between">
                                            <h2>Txn Ref: </h2>
                                            <span class="font-bold clipboard cursor-pointer"
                                                data-copy="{{ $withdrawal->ref }}">{{ $withdrawal->ref }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div
                                    class="w-full flex justify-center items-center p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500"
                                        fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span>Empty Record. No withdrawal found!</span>
                                </div>
                            @endforelse





                            <div class="w-full flex items-center p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer simple-pagination"
                                data-paginator="withdrawals">
                                {{ $withdrawals->links('paginations.simple') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // search withdrawal
        $(document).on('input keyup', '#search-withdrawal-input', function(e) {
            var ref = $(this).val();
            var base_link = $('#search-withdrawal-button').data('link');
            var encodedRef = encodeURIComponent(ref);

            // Append the query parameter to the URL
            var link = base_link + '?s=' + encodedRef;
            $('#search-withdrawal-button').attr('href', link);
        });

        let interval;
        //single withdrawal
        $(document).on('click', '.view-single-withdrawal', function(e) {
            var clicked = $(this);
            clicked.addClass('relative disabled');
            clicked.append('<span class="button-spinner"></span>');
            clicked.prop('disabled', true);
            var link = $(this).data('link');
            $('#single-display-new-withdrawal-information').removeClass('hidden');
            var html = $('#single-display-new-withdrawal-information');

            $.ajax({
                url: link,
                method: 'GET',
                success: function(response) {
                    var withdrawal = response.withdrawal;

                    Swal.fire({
                        html: `
                        <div class="mt-5" id="single-display-new-withdrawal-information">
                            <div>
                                <div class="p-2 w-full rounded-lg border border-slate-800 hover:border-slate-600">
                                    <div class="w-full flex justify-center items-center mb-2">
                                        <div id="single_wallet_qrcode" class="clipboard" data-copy=""></div>
                                    </div>
                                    <div class="w-full text-mono text-sm break-all">
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Status </h2>
                                            <h2 class="font-bold"> <span id="single_display_withdrawal_status"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Valid Until </h2>
                                            <h2 class="font-bold"> <span id="single_display_withdrawal_valid_until"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Amount </h2>
                                            <h2 class="font-bold">{{ site('currency') }}<span id="single_display_withdrawal_amount"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Fee </h2>
                                            <h2 class="font-bold">{{ site('currency') }}<span id="single_display_withdrawal_fee"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Pay Amount</h2>
                                            <h2 class="font-bold"><span id="single_display_withdrawal_converted_amount"
                                                    class="clipboard cursor-pointer" data-copy=""> </span> <span
                                                    id="single_display_withdrawal_currency"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Network </h2>
                                            <h2 class="font-bold"><span id="single_display_withdrawal_network"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Wallet Address </h2>
                                            <h2 class="font-bold"><span id="single_display_withdrawal_payment_wallet"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Txn Ref </h2>
                                            <h2 class="font-bold"><span id="single_display_withdrawal_ref" class="clipboard cursor-pointer"
                                                    data-copy=""></span>
                                            </h2>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>
                        `,
                        toast: false,
                        background: 'rgb(7, 3, 12, 0)',
                        showConfirmButton: false,
                        showCloseButton: true,
                        allowEscapeKey: false, // Prevent closing by escape key
                        allowOutsideClick: false, // Prevent closing by clicking backdrop
                        willClose: () => {
                            //delete the previously generated qrcode
                            // $('#single_wallet_qrcode').html('');
                        }
                    });


                    // Loop through the withdrawal object's properties
                    for (var key in withdrawal) {
                        if (withdrawal.hasOwnProperty(key)) {
                            var value = withdrawal[key];
                            var element = $('#single_display_withdrawal_' + key);
                            if (element.length > 0) {
                                element.text(value);
                            }

                            //update the copy attribute
                            if (element.hasClass('clipboard')) {
                                element.attr('data-copy', value);
                            }


                        }
                    }

                    // create qrcode
                    var qrCodeElement = document.getElementById('single_wallet_qrcode');
                    var qrCode = new QRCode(qrCodeElement, {
                        text: withdrawal.payment_wallet,
                        width: 128,
                        height: 128
                    });

                    var walletQrCodeDiv = document.getElementById('single_wallet_qrcode');
                    walletQrCodeDiv.setAttribute('data-copy', withdrawal.payment_wallet);
                    var imageElement = walletQrCodeDiv.querySelector('img');
                    imageElement.classList.add('rounded-lg', 'border', 'border-slate-800',
                        'hover:border-slate-600', 'cursor-pointer', 'p-1');
                    //imageElement.setAttribute('style', '');

                    //create a count down
                    var targetId = 'single_display_withdrawal_valid_until';
                    var targetDateString = withdrawal.valid_until;
                    if (interval) {
                        clearInterval(interval);
                    }

                    interval = setInterval(function() {
                        updateCountdown(targetId, targetDateString);
                    }, 1000);

                    // Check payment status
                    var ref = withdrawal.ref
                    setInterval(function() {
                        $.ajax({
                            url: "{{ url('/user/withdrawals/view') }}" + '/' +
                                withdrawal
                                .ref,
                            method: 'GET',
                            success: function(response) {
                                var status = response.withdrawal.status;
                                $('#single_display_withdrawal_status').html(status);


                            }
                        });
                    }, 10000);


                },
                complete: function() {
                    clicked.removeClass('disabled');
                    clicked.find('.button-spinner').remove();
                    clicked.prop('disabled', false);

                }
            });

        });
        // select the withdrawal coin
        $(document).on('click', ".coin", function(e) {
            $('.coin_select').addClass('hidden');
            var target = '#' + $(this).data('target');
            $(target).toggleClass('hidden');

            var currency_code = $(this).data('currency_code');
            var wallet_address = $(this).data('wallet');
            $("#currency_code").val(currency_code);
            if (wallet_address) {
                $("#wallet_address").val(wallet_address);
            }

        });

        // select the withdrawal wallet coin
        $(document).on('click', ".coin2", function(e) {
            $('.coin_select2').addClass('hidden');
            var target = '#' + $(this).data('target');
            $(target).toggleClass('hidden');

            var currency_code = $(this).data('currency_code');
            $("#currency_code2").val(currency_code);

        });


        // filter the coins
        $(document).on('input keyup', '#coin-search-input', function() {
            var searchText = $(this).val().toLowerCase();

            $('.coin').hide().filter(function() {
                return $(this).text().toLowerCase().includes(searchText);
            }).show();
        });

        // filter the coins for new wallets
        $(document).on('input keyup', '#coin-search-input2', function() {
            var searchText = $(this).val().toLowerCase();

            $('.coin2').hide().filter(function() {
                return $(this).text().toLowerCase().includes(searchText);
            }).show();
        });


        // handle withdrawal form
        $(document).on('submit', '#withdrawalFormbt', function(e) {
            e.preventDefault();
            var amount = $('#amount').val() * 1;
            var currency_code = $('#currency_code').val();
            var min_withdrawal = "{{ site('min_withdrawal') }}" * 1;
            var max_withdrawal = "{{ site('max_withdrawal') }}" * 1;
            var currency = "{{ site('currency') }}";

            //check the currency code
            var error = null;
            if (!currency_code) {
                error = 'You have not selected a withdrawal method';
            }

            //check min and max withdrawal
            if (amount < min_withdrawal) {
                error = 'Minimum withdrawal amount is ' + currency + min_withdrawal;
            }

            if (amount > max_withdrawal) {
                error = 'Maximum withdrawal amount is ' + currency + max_withdrawal;
            }

            if (error === null) {
                var form = $(this);
                var formData = new FormData(this);

                var submitButton = $(this).find('button[type="submit"]');
                submitButton.addClass('relative disabled');
                submitButton.append('<span class="button-spinner"></span>');
                submitButton.prop('disabled', true);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {


                        loadPage(window.location.href, submitButton, '#pageContent');

                        $('html, body').animate({
                            scrollTop: 0 + 100
                        }, 800);
                        toastNotify('success', 'withdrawal request initated successfully');




                    },
                    error: function(xhr, status, error) {

                        if (status == 422) {
                            var errors = xhr.responseJSON.errors;

                            if (errors) {
                                $.each(errors, function(field, messages) {
                                    var fieldErrors = '';
                                    $.each(messages, function(index, message) {
                                        fieldErrors += message + '<br>';
                                    });


                                    Swal.fire({
                                        icon: 'error',
                                        html: fieldErrors,
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter',
                                                Swal.stopTimer);
                                            toast.addEventListener('mouseleave',
                                                Swal.resumeTimer);
                                        }
                                    });
                                });
                            } else {
                                toastNotify('error', 'An Error occured, try again later');
                            }
                        } else {
                            toastNotify('error', 'Server Error occured, try again later');
                        }



                    },
                    complete: function() {
                        submitButton.removeClass('disabled');
                        submitButton.find('.button-spinner').remove();
                        submitButton.prop('disabled', false);

                    }
                });
            } else {

                toastNotify('error', error);

            }

        });
    </script>
@endsection
