@extends('layouts.fronty')

@section('contents')
    <div class="container-fluid">

        <!-- start page title -->

        <!-- end page title -->
        <div class="col-sm-12">

            <div class="card">
                <h5 class="card-header bg-primary text-white">Profile</h5>
                <div class="card-body">




                    <form action="{{ route('user.profile.edit-validate') }}" method="post" class="gen-form">

                        @csrf

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Set Username:</td>
                                        <td><input type="text" class="form-control" name="username"
                                                value="{{ user()->username }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Registration date:</td>
                                        <td>{{ user()->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Your Full Name:</td>
                                        <td><input type="text" name="name" id="name" value="{{ user()->name }}"
                                                class="form-control">
                                            <span class="text-xs text-red-500">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                              <td>New Password:</td>
                              <td><input type="password" name="password" value="" class="form-control"></td>
                            </tr>
                            <tr>
                              <td>Retype Password:</td>
                              <td><input type="password" name="password2" value="" class="form-control"></td>
                            </tr>-->
                                    <tr>
                                        <td>Your USDT TRC20 Account ID:</td>
                                        <td><input type="text" class="form-control" name="usdt_wallet" id="usdt_wallet"
                                                value="{{ user()->usdt_wallet }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Your USDT ERC20 Account ID:</td>
                                        <td><input type="text" class="form-control" name="usdterc_wallet" id="usdterc_wallet"
                                                value="{{ user()->usdterc_wallet }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Your USDT BSC Account ID:</td>
                                        <td><input type="text" class="form-control" name="usdtbsc_wallet" id="usdtbsc_wallet"
                                                value="{{ user()->usdtbsc_wallet }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Your E-mail address:</td>
                                        <td><input type="text" name="email" id="email" value="{{ user()->email }}"
                                                class="form-control" disabled></td>
                                        <span class="text-xs text-red-500">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </tr>



                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" value="Change Account data"
                                                class="btn bg-blue-500 btn-primary ml-auto"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
