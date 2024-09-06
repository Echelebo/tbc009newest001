@extends('layouts.auth')

@section('contents')
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                    <div class="px-xl-4">
                        <div class="bg-white rounded-ultra shadow-lg px-4 py-5 p-md-5">

                            <!--<div class="mb-4 text-center">
                                            <img src="/prime/assets/svg/upload/login-03.svg" alt="Login" data-width="64px"
                                                data-height="64px" style="width: 64px; height: 64px;">
                                        </div>-->

                            <div class="pb-1"></div>

                            <h3 class="section-title-4 text-center font-weight-800 mb-4">
                                Forgot Password

                            </h3>

                            <h3>Forgot your password:</h3><br>





                            <form method="post" action="{{ route('user.forgot-password.send') }}" id="registerForm">
                                @csrf


                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input class="form-control form-control-lg" type="email" id="email"
                                            name="email" value="" placeholder="Email">
                                        <span>
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>

                                <div data-height="5px" style="height: 5px;"></div>
                                <button id="registerBtn" type="submit"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500"><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"></i>Send</button>

                                <div class="font-semibold mt-4 px-5 lg:px-10">
                                    <a href="{{ route('user.login') }}" class="hover:text-blue-700">Back to login</a>
                                </div>
                            </form>

                            <form method="post" class="hidden" action="{{ route('user.forgot-password.validate') }}"
                                id="verifyForm">
                                @csrf


                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="otp" class="form-control form-control-lg" type="number"
                                            name="otp" value="" placeholder="OTP" required maxlength="6">
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
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="password" class="form-control form-control-lg" type="password"
                                            name="password" value="" placeholder="Password">
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
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="confirm-password" class="form-control form-control-lg" type="password"
                                            name="password_confirmation" value="" placeholder="Confirm Password">
                                        <span>
                                            @error('password-confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>

                                <div data-height="5px" style="height: 5px;"></div>
                                <button id="verifyBtn" type="submit"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500"><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"></i>Save</button>

                                <div class="font-semibold mt-4 px-5 lg:px-10">
                                    <a href="{{ route('user.login') }}" class="hover:text-blue-700">Back to login</a>
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

                        //hide register form and display verification form
                        $('#registerForm').hide();
                        $('#verifyForm').show();

                        //update page title
                        $('#page-title').html('Set New Password');




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
                        var url = "{{ route('user.login') }}";
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
