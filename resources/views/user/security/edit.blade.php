@extends('layouts.user')

@section('contents')
    <div class="w-full p-3" id="refresh">
        <div class="w-full lg:flex lg:gap-3">
            <div class="w-full lg:w-1/3 h-20 ts-gray-2-x rounded-lg p-5 mb-3">
                <div class="w-full grid grid-cols-1 gap-3 p-2">
                    
                    <a data-target="security" role="button"
                        class="border-l-4 border-orange-500 px-3 hover:scale-110 hover:text-purple-700 transition-all cursor-pointer rescron-card-trigger">
                        Security</a>

                    



                </div>
            </div>
            <div class="w-full lg:w-2/3">
                

                <div class="w-full p-5 mb-5 ts-gray-2-x rounded-lg rescron-card transition-all" id="security">
                    <h3 class="capitalize  font-extrabold "><span class="border-b-2">Update Password</span>
                    </h3>
                    <form action="{{ route('user.profile.password') }}" class="mt-5 gen-form">
                        @csrf

                        <div class="w-full grid grid-cols-1  gap-5 mb-3">
                            <div class="grid grid-cols-1 mb-2">
                                <div class="relative">

                                    <span class="theme1-input-icon material-icons">
                                        lock
                                    </span>
                                    <input type="password" name="current_password" placeholder="Current Password"
                                        id="current_password" class="theme1-text-input" required>
                                    <label for="current_password"
                                        class="placeholder-label text-gray-300 ts-gray-2 px-2">Current Password <span
                                            class="text-red-500">*</span></label>
                                    <span class="text-xs text-red-500">
                                        @error('current_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mb-2">
                                <div class="relative">

                                    <span class="theme1-input-icon material-icons">
                                        lock
                                    </span>
                                    <input type="password" name="password" placeholder="New Password" id="password"
                                        class="theme1-text-input" required>
                                    <label for="password" class="placeholder-label text-gray-300 ts-gray-2 px-2">New
                                        Password <span class="text-red-500">*</span></label>
                                    <span class="text-xs text-red-500">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mb-2">
                                <div class="relative">

                                    <span class="theme1-input-icon material-icons">
                                        lock
                                    </span>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                        id="password_confirmation" class="theme1-text-input" required>
                                    <label for="password_confirmation"
                                        class="placeholder-label text-gray-300 ts-gray-2 px-2">Confirm Password <span
                                            class="text-red-500">*</span></label>
                                    <span class="text-xs text-red-500">
                                        @error('password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                        </div>


                        <div class="w-full grid grid-cols-1 gap-5 mt-10 mb-10">
                            <button type="submit"
                                class="bg-blue-500 px-2 py-1 text-white hover:scale-110 transition-all">Save
                                Changes </button>
                        </div>

                    </form>

                    <div class="h-10"></div>

                    <h3 class="capitalize  font-extrabold "><span class="border-b-2">
                            @if (user()->g2fa == 0)
                                Enable
                            @else
                                Disable
                            @endif 2FA
                        </span>
                    </h3>
                    <form action="{{ route('user.profile.g2fa') }}" class="mt-5 gen-form" data-action="reload">
                        @csrf

                        <div class="w-full grid grid-cols-1  gap-5 mb-3">
                            @if (user()->g2fa == 0)
                                <div class="w-full flex justify-center items-center mb-2">
                                    <div id="wallet_qrcode" class="clipboard" data-copy=""></div>
                                </div>


                                <div class="grid grid-cols-1 mb-2">
                                    <p>Scan the QRCode above or copy the 2FA Code below to set up your 2fa</p>
                                    <div class="w-full flex justify-between items-center px-2 py-1 ts-gray-1 rounded-lg">
                                        <span> {{ user()->g2fa_secret }}</span>
                                        <span class="text-orange-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="grid grid-cols-1 mb-2">
                                    <p>Enter the One time passcode from your google authenticator app to disable your g2fa
                                    </p>

                                </div>
                            @endif

                            <div class="grid grid-cols-1 mb-2">
                                <div class="relative">

                                    <span class="theme1-input-icon material-icons">
                                        lock
                                    </span>
                                    <input type="number" name="one_time_password" placeholder="2Fa Code"
                                        id="one_time_password" class="theme1-text-input" required>
                                    <label for="one_time_password"
                                        class="placeholder-label text-gray-300 ts-gray-2 px-2">2FA Code <span
                                            class="text-red-500">*</span></label>
                                    <span class="text-xs text-red-500">
                                        @error('one_time_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                        </div>


                        <div class="w-full grid grid-cols-1 gap-5 mt-10 mb-10">
                            <button type="submit"
                                class="bg-blue-500 px-2 py-1  text-white hover:scale-110 transition-all">Save
                                Changes </button>
                        </div>

                    </form>
                </div>


                

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @if (user()->g2fa == 0)
        <script>
            $(document).ready(function() {
                // create qrcode
                var qrCodeElement = document.getElementById('wallet_qrcode');
                var text = "{{ $qr_code_url }}";
                var qrCode = new QRCode(qrCodeElement, {
                    text: text,
                    width: 128,
                    height: 128
                });

                var walletQrCodeDiv = document.getElementById('wallet_qrcode');
                walletQrCodeDiv.classList.add('disabled');
                var imageElement = walletQrCodeDiv.querySelector('img');
                imageElement.classList.add('rounded-lg', 'border', 'border-slate-800',
                    'hover:border-slate-600', 'cursor-pointer', 'p-1');
            });
        </script>
    @endif
@endsection
