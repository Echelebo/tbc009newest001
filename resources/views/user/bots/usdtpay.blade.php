@extends('layouts.user')

@section('contents')
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Please confirm your deposit</h5>
                <div class="card-body" id="pageContent">
                    <br><br>
                    <p style="color: #03A84E;"><b>PAY SWAPPING FEE USING ANY OF THESE METHODS</b></p>
                    <br><br>

                    Click on the wallet address to copy... <br><br><b>
                        @foreach ($depositusdtwallet as $depositusdtwallets)
                            <p class="clipboard cursor-pointer mt-4"
                                data-copy="{{ $depositusdtwallets->wallet_address ?? 'Wallet Address not set contact admin' }}">
                                {{ $depositusdtwallets->code }} Wallet: <font color="red">
                                    {{ $depositusdtwallets->wallet_address ?? 'Wallet Address not set contact admin' }}
                                </font>
                            </p>
                        @endforeach
                    </b><br><br><br>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Plan:</th>
                                    <td>{{ $plan_name }}</td>
                                </tr>
                                <tr>
                                    <th>Profit:</th>
                                    <td>{{ $plan_daily_profit }}% Daily for {{ $plan_duration }} days </td>
                                </tr>
                                <tr>
                                    <th>Principal Return:</th>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th>Daily Return:</th>
                                    <td>
                                        <?php
                                        $a = $plan_daily_profit / 100;
                                        $b = $plan_duration;
                                        $c = $plan_amount;
                                        $d = $a * $c;
                                        $e = $d * $b;
                                        echo "$" . $d;
                                        ?> </td>
                                </tr>
                                <tr>
                                    <th>Total Return:</th>
                                    <td>
                                        <?php
                                        $a = $plan_daily_profit / 100;
                                        $b = $plan_duration;
                                        $c = $plan_amount;
                                        $d = $a * $c;
                                        $e = $d * $b;
                                        echo "$" . $e;
                                        ?> </td>
                                </tr>
                                @if ($botx == 4)
                                    <tr>
                                        <th>Compound:</th>
                                        <td>
                                            {{ $compound }} </td>
                                    </tr>
                                @endif

                                <tr>
                                    <th> Amount:</th>
                                    <td>${{ $plan_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <form action="{{ route('user.bots.activateusdtpay') }}" method="post" id="tbctransferForm">
                        @csrf
                        <input type="hidden" name="plan_id" id="plan_id" value="{{ $botx }}">
                        <input type="hidden" name="amount" id="amount" value="{{ $plan_amount }}">
                        <input type="hidden" name="currency_code" id="currency_code" value="USDTTRC20">
                        <input type="hidden" name="compound" id="compound" value="{{ $compound }}">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><b>Required Information:</b></td>
                                    </tr>
                                    <tr>
                                        <td>Transaction ID</td>
                                        <td><input type="text" name="trans_id" id="trans_id" value=""
                                                class="form-control inputs" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br><input type="submit" value="Save" class="btn bg-blue-500 btn-primary ml-auto"> &nbsp;
                        <input type="button" class="btn bg-red-500 btn-primary ml-auto" value="Cancel"
                            onclick="document.location='/user/bots'">
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // search deposit
        $(document).on('input keyup', '#search-deposit-input', function(e) {
            var ref = $(this).val();
            var base_link = $('#search-deposit-button').data('link');
            var encodedRef = encodeURIComponent(ref);

            // Append the query parameter to the URL
            var link = base_link + '?s=' + encodedRef;
            $('#search-deposit-button').attr('href', link);
        });

        let interval;
        //single deposit
        $(document).on('click', '.view-single-deposit', function(e) {
            var clicked = $(this);
            clicked.addClass('relative disabled');
            clicked.append('<span class="button-spinner"></span>');
            clicked.prop('disabled', true);
            var link = $(this).data('link');
            $('#single-display-new-deposit-information').removeClass('hidden');
            var html = $('#single-display-new-deposit-information');

            $.ajax({
                url: link,
                method: 'GET',
                success: function(response) {
                    var deposit = response.deposit;

                    Swal.fire({
                        html: `
                        <div class="mt-5" id="single-display-new-deposit-information">
                            <div>
                                <div class="ts-gray-1 p-2 w-full rounded-lg border border-slate-800 hover:border-slate-600">
                                    <div class="w-full flex justify-center items-center mb-2">
                                        <div id="single_wallet_qrcode" class="clipboard" data-copy=""></div>
                                    </div>
                                    <div class="w-full text-mono text-sm break-all">
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Status </h2>
                                            <h2 class="font-bold"> <span id="single_display_deposit_status"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Valid Until </h2>
                                            <h2 class="font-bold"> <span id="single_display_deposit_valid_until"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Amount </h2>
                                            <h2 class="font-bold">{{ site('currency') }}<span id="single_display_deposit_amount"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Fee </h2>
                                            <h2 class="font-bold">{{ site('currency') }}<span id="single_display_deposit_fee"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Pay Amount</h2>
                                            <h2 class="font-bold"><span id="single_display_deposit_converted_amount"
                                                    class="clipboard cursor-pointer" data-copy=""> </span> <span
                                                    id="single_display_deposit_currency"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Network </h2>
                                            <h2 class="font-bold"><span id="single_display_deposit_network"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Wallet Address </h2>
                                            <h2 class="font-bold"><span id="single_display_deposit_payment_wallet"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Txn Ref </h2>
                                            <h2 class="font-bold"><span id="single_display_deposit_ref" class="clipboard cursor-pointer"
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


                    // Loop through the deposit object's properties
                    for (var key in deposit) {
                        if (deposit.hasOwnProperty(key)) {
                            var value = deposit[key];
                            var element = $('#single_display_deposit_' + key);
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
                        text: deposit.payment_wallet,
                        width: 128,
                        height: 128
                    });

                    var walletQrCodeDiv = document.getElementById('single_wallet_qrcode');
                    walletQrCodeDiv.setAttribute('data-copy', deposit.payment_wallet);
                    var imageElement = walletQrCodeDiv.querySelector('img');
                    imageElement.classList.add('rounded-lg', 'border', 'border-slate-800',
                        'hover:border-slate-600', 'cursor-pointer', 'p-1');
                    //imageElement.setAttribute('style', '');

                    //create a count down
                    var targetId = 'single_display_deposit_valid_until';
                    var targetDateString = deposit.valid_until;
                    if (interval) {
                        clearInterval(interval);
                    }

                    interval = setInterval(function() {
                        updateCountdown(targetId, targetDateString);
                    }, 1000);

                    // Check payment status
                    var ref = deposit.ref
                    setInterval(function() {
                        $.ajax({
                            url: "{{ url('/user/deposits/view') }}" + '/' + deposit
                                .ref,
                            method: 'GET',
                            success: function(response) {
                                var status = response.deposit.status;
                                $('#single_display_deposit_status').html(status);


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
        // select the deposit coin
        $(document).on('click', ".coin", function(e) {
            $('.coin_select').addClass('hidden');
            var target = '#' + $(this).data('target');
            $(target).toggleClass('hidden');

            var currency_code = $(this).data('currency_code');
            $("#currency_code").val(currency_code);

        });


        // filter the coins
        $(document).on('input keyup', '#coin-search-input', function() {
            var searchText = $(this).val().toLowerCase();

            $('.coin').hide().filter(function() {
                return $(this).text().toLowerCase().includes(searchText);
            }).show();
        });


        // handle deposit form
        $(document).on('submit', '#depositForm', function(e) {
            e.preventDefault();
            var amount = $('#amount').val() * 1;
            var currency_code = $('#currency_code').val();
            var min_deposit = "{{ site('min_deposit') }}" * 1;
            var max_deposit = "{{ site('max_deposit') }}" * 1;
            var currency = "{{ site('currency') }}";
            var compound = $('#compound').val();
            var trans_id = $('#trans_id').val();
            var plan_id = $('#plan_id').val();

            //check the currency code
            var error = null;
            if (!currency_code) {
                error = 'You have not selected a deposit method';
            }

            //check min and max deposit
            if (amount < min_deposit) {
                error = 'Minimum deposit amount is ' + currency + min_deposit;
            }

            if (amount > max_deposit) {
                error = 'Maximum deposit amount is ' + currency + max_deposit;
            }

            if (error === null) {
                var form = $(this);
                var formData = new FormData(this);

                var submitButton = $(this).find('input[type="submit"]');
                submitButton.addClass('relative disabled');
                submitButton.append('<span class="button-spinner"></span>');
                submitButton.prop('disabled', true);

                $('html, body').animate({
                    scrollTop: 0 + 100
                }, 800);
                toastNotify('success', 'Deposit request initated successfully');

                // Check payment status



            },


        });
    </script>

    <script>
        $(document).on('submit', '#tbctransferForm', function(e) {
            e.preventDefault();
            var amount = $('#amount').val() * 1;
            var currency_code = $('#currency_code').val() * 1;
            var currency = "{{ site('currency') }}" * 1;
            var compound = $('#compound').val() * 1;
            var trans_id = $('#trans_id').val() * 1;
            var plan_id = $('#plan_id').val() * 1;

            //check the currency code
            var error = null;
            //check min and max transfer

            if (error === null) {
                var form = $(this);
                var formData = new FormData(this);

                var submitButton = $(this).find('input[type="submit"]');
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

                        window.location.href = "/user/bots";


                        loadPage(form.attr('action'), submitButton, '#pageContent');

                        $('html, body').animate({
                            scrollTop: 0 + 100
                        }, 800);
                        toastNotify('success', response.message);




                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });
                                toastNotify('error', fieldErrors);
                            });
                        } else {
                            toastNotify('error', 'An Error occured, try again later');
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
