@extends('layouts.fronty')

@section('contents')
    <div class="container-fluid" id="pageContent">




        <div class="col-sm-12">
            <form action="{{ route('user.withdrawals.new') }}" method="post" id="withdrawalForm" class="gen-form"
                data-action="reload">
                @csrf
                <!--<input type="hidden" name="currency_code" id="currency_code" value="USDTTRC20">-->

                <div class="col-sm-12">
                    <div class="card">
                        <h5 class="card-header bg-primary text-white">Withdraw</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Account Balance:</td>
                                            <td><b>{{ formatAmount(user()->exch_balance) }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Pending Withdrawals: </td>
                                            <td><b>{{ formatAmount($pending_withdrawals) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th scope="col">Wallet</th>
                                            <th scope="col">Address</th>
                                        </tr>
                                        @foreach ($coins as $coin)
                                            <tr>

                                                <td><input type="radio" name="currency_code" id="currency_code"
                                                        value="{{ $coin->code }}" required></td>
                                                <td>{{ $coin->code }}</td>
                                                @if ($coin->id == 219)
                                                    @if (is_null(user()->usdtbsc_wallet))
                                                        <td><a class="badge badge-danger"
                                                                href="{{ route('user.profile.edit') }}"><i>set
                                                                    wallet</i></a></td>
                                                    @else
                                                        <td>{{ user()->usdtbsc_wallet }}</td>
                                                    @endif
                                                @elseif ($coin->id == 221)
                                                    @if (is_null(user()->usdterc_wallet))
                                                        <td><a class="badge badge-danger"
                                                                href="{{ route('user.profile.edit') }}"><i>set
                                                                    wallet</i></a></td>
                                                    @else
                                                        <td>{{ user()->usdterc_wallet }}</td>
                                                    @endif
                                                @elseif ($coin->id == 224)
                                                    @if (is_null(user()->usdt_wallet))
                                                        <td><a class="badge badge-danger"
                                                                href="{{ route('user.profile.edit') }}"><i>set
                                                                    wallet</i></a></td>
                                                    @else
                                                        <td>{{ user()->usdt_wallet }}</td>
                                                    @endif
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Withdrawal amount($):</td>
                                            <td><input type="text" name="amount" id="amount" value=""
                                                    class="form-control" size="15" placeholder="Amount" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <textarea name="comment" class="form-control" cols="45" rows="4">Your comment</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" value="Request"
                                                    class="btn bg-blue-500 btn-primary ml-auto"></td>
                                        </tr>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                                <div class=" p-2 w-full rounded-lg border border-slate-800 hover:border-slate-600">
                                    <div class="w-full flex justify-center items-center mb-2">
                                        <div id="single_wallet_qrcode" class="clipboard" data-copy=""></div>
                                    </div>
                                    <div class="w-full text-mono text-sm break-all">
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Status </h2>
                                            <h2 class="font-bold" style="font-size: 14px;"> <span id="single_display_withdrawal_status"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Valid Until </h2>
                                            <h2 class="font-bold" style="font-size: 14px;"> <span id="single_display_withdrawal_valid_until"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Amount </h2>
                                            <h2 class="font-bold" style="font-size: 14px;">{{ site('currency') }}<span id="single_display_withdrawal_amount"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Fee </h2>
                                            <h2 class="font-bold" style="font-size: 14px;">{{ site('currency') }}<span id="single_display_withdrawal_fee"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Pay Amount</h2>
                                            <h2 class="font-bold" style="font-size: 14px;"><span id="single_display_withdrawal_converted_amount"
                                                    class="clipboard cursor-pointer" data-copy=""> </span> <span
                                                    id="single_display_withdrawal_currency"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Network </h2>
                                            <h2 class="font-bold" style="font-size: 14px;"><span id="single_display_withdrawal_network"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Wallet Address </h2>
                                            <h2 class="font-bold" style="font-size: 14px;"><span id="single_display_withdrawal_payment_wallet"
                                                    class="clipboard cursor-pointer" data-copy=""></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2 style="font-size: 14px;">Txn Ref </h2>
                                            <h2 class="font-bold" style="font-size: 14px;"><span id="single_display_withdrawal_ref" class="clipboard cursor-pointer"
                                                    data-copy=""></span>
                                            </h2>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>
                        `,
                            toast: false,
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
            $(document).on('submit', '#withdrawalForm', function(e) {
                e.preventDefault();
                var amount = $('#amount').val() * 1;
                var currency_code = $('#currency_code').val();
                var min_withdrawal = "{{ site('min_withdrawal') }}" * 1;
                var max_withdrawal = "{{ site('max_withdrawal') }}" * 1;
                var currency = "{{ site('currency') }}";

                //check the currency code
                var error = null;
                //if (!currency_code) {
                //     error = 'You have not selected a withdrawal method';
                // }

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
