@extends('layouts.auth')

@section('contents')
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                    <div class="px-xl-4">
                        <div class="bg-white rounded-ultra shadow-lg px-8 py-5 p-md-5">

                            <!--<div class="mb-4 text-center">
                                                    <img src="/prime/assets/svg/upload/register-03.svg" alt="Register" data-width="64px"
                                                        data-height="64px" style="width: 64px; height: 64px;">
                                                </div>-->

                            <div class="pb-1"></div>

                            <h3 class="section-title-4 text-center font-weight-800 mb-4">
                                Member Register
                            </h3>



                            <form method="post" action="{{ route('user.register-validate') }}" id="registerForm">
                                @csrf


                                <div class="input-group input-group-lg input-group-round mb-4">
                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" value=""
                                            class="form-control form-control-lg" placeholder="Name">
                                        <span>
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>
                                <!-- <div class="input-group input-group-lg input-group-round mb-4">
                                                        <label class="text-uppercase px-3">User Name</label>
                                                        <div class="input-group-inner">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                                        aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" id="username" name="username" value=""
                                                                class="form-control form-control-lg" placeholder="User Name">
                                                            <span>
                                                                @error('username')
        {{ $message }}
    @enderror
                                                            </span>
                                                            <div class="input-focus-bg"></div>
                                                        </div>
                                                    </div>-->

                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-envelope"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" id="email" name="email" value=""
                                            class="form-control form-control-lg" placeholder="Email">
                                        <span>
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>
                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="fa fa-lock"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="password" type="password" name="password" value=""
                                            class="form-control form-control-lg" placeholder="Password">
                                        <span>
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>
                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="fa fa-lock"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="confirm-password" type="password" name="password_confirmation"
                                            value="" class="form-control form-control-lg"
                                            placeholder="Confirm password">
                                        <span>
                                            @error('password-confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>
                                <!--<div class="input-group input-group-lg input-group-round mb-4">
                                                        <label class="text-uppercase px-3">Your USDT TRC20 Account ID</label>
                                                        <div class="input-group-inner">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                                        aria-hidden="true"></i></span>
                                                            </div>
                                                            <input class="form-control form-control-lg" type="text" size="30"
                                                                name="usdt_wallet" value="">
                                                            <div class="input-focus-bg"></div>
                                                        </div>
                                                    </div>-->

                                <!-- <div class="input-group input-group-lg input-group-round mb-4">
                                                        <label class="text-uppercase px-3">Your Upline</label>
                                                        <div class="input-group-inner">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text input-group-icon"><i class="far fa-eye-slash"
                                                                        aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" disabled="" id="upline" value=""
                                                                class="form-control form-control-lg" placeholder="Your Upline">

                                                            <div class="input-focus-bg"></div>
                                                        </div>
                                                    </div>-->
                                <!--<div class="input-group input-group-lg input-group-round mb-4">
                                                                    <label class="text-uppercase px-3">Retype Your E-mail</label>
                                                                    <div class="input-group-inner">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text input-group-icon"><i class="far fa-envelope" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <input type="text" name="email1" value="" class="form-control form-control-lg" placeholder="Retype Your E-mail">
                                                                        <div class="input-focus-bg"></div>
                                                                    </div>
                                                                </div>

                                                                <!--<div class="input-group input-group-lg input-group-round mb-4">
                                                                    <label class="text-uppercase px-3">Your Upline</label>
                                                                    <div class="input-group-inner">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text input-group-icon"><i class="far fa-eye-slash" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <input type="text" value="Alicekarlsson8" placeholder="Your Upline" disabled="" class="form-control form-control-lg">
                                                                        <div class="input-focus-bg"></div>
                                                                    </div>
                                                                </div> -->

                                <!--<div class="px-3">
                                                        <div class="form-group custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="agreeTerms"
                                                                name="agree" value="1">
                                                            <label class="custom-control-label" for="agreeTerms">I agree to the <a
                                                                    href="{{ route('tos') }}" target="_blank"
                                                                    class="text-dark font-weight-500">Terms and Conditions</a>.</label>
                                                        </div>
                                                    </div>-->

                                <button type="submit" id="registerBtn"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500">Register</button>

                                <div class="mt-8 px-2 font-semibold lg:px-10 text-center">
                                    <a href="{{ route('user.login') }}" class="hover:text-blue-700">Login with existing account <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </form>









                            <form method="post" action="{{ route('user.register-verify') }}" class="hidden"
                                id="verifyForm">
                                @csrf


                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-eye-slash"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="number" id="otp" name="otp" value=""
                                            class="form-control form-control-lg" placeholder="OTP" required
                                            maxlength="6">
                                        <span>
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>









                                <button type="submit" id="verifyBtn"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500"><i
                                        class="fas fa-edit" aria-hidden="true"></i>Verify</button>

                                <div class="mt-4 px-2 font-semibold lg:px-10 text-center">
                                    <a href="{{ route('user.register') }}" class="hover:text-blue-700">Go Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const ref = urlParams.get('ref')
            document.getElementById('upline').value = ref;
        })();
    </script>

    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var form = $(this);
                var formData = form.serialize(); // Serialize form data as JSON

                var clicked = $('#registerBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        var verify = response.verify;
                        $('#noticeMsg').html(verifyText).show();
                        toastNotify('success', verifyText);

                        if (verify == 1) {
                            //hide register form and display verification form
                            $('#registerForm').hide();
                            $('#verifyForm').show();

                            //update page title
                            $('#page-title').html('Verify Email');
                        } else {
                            var url = '{{ route('user.dashboard') }}';
                            window.location.href = url;
                        }




                    },
                    error: function(xhr, status, error) {
                        $('#registerBtn').show();
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
                            toastNotify('error', 'An error occured, please try again later');

                        }


                    },
                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });


            //otp form
            $('#verifyForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var form = $(this);
                var formData = form.serialize(); // Serialize form data as JSON

                var clicked = $('#verifyBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        $('#noticeMsg').html(verifyText).show();
                        toastNotify('success', verifyText);
                        var url = '{{ route('user.dashboard') }}';
                        window.location.href = url;

                    },
                    error: function(xhr, status, error) {
                        $('#registerBtn').show();
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
                            toastNotify('error', 'An error occured, please try again later');

                        }


                    },

                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });
        });
    </script>
@endsection
