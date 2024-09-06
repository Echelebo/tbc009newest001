@extends('layouts.admin')

@section('contents')
    <div class="w-full p-3" id="refresh">
        <div class="w-full lg:flex lg:gap-3">
            <div class="w-full lg:w-1/3 h-52 ts-gray-2 rounded-lg p-5 mb-3">
                <div class="w-full grid grid-cols-1 gap-3 p-2">
                    <h3 class="border-l-4 border-orange-500 px-3 cursor-pointer flex justify-between items-center">
                        <span>Approved</span>
                        <span class="text-green-500">{{ $summary['finished'] }}</span>
                    </h3>

                    <h3 class="border-l-4 border-orange-500 px-3 cursor-pointer flex justify-between items-center">
                        <span>Pending</span>
                        <span class="text-orange-500">{{ $summary['waiting'] }}</span>
                    </h3>







                </div>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="w-full p-5 mb-5 ts-gray-2 rounded-lg transition-all rescron-card" id="deposits">
                    <h3 class="capitalize  font-extrabold "><span class="border-b-2">History</span>
                    </h3>

                    <div class="w-full">


                        <div class="grid grid-cols-1 gap-3 mt-5">
                            <div class="flex justify-end mb-5">
                                <div class="flex justify-end items-center  mb-2 mt-5">
                                    <div class="relative">

                                        <span class="theme1-input-icon material-icons">
                                            search
                                        </span>
                                        <input type="text" placeholder="Txn Ref" id="search-update-input"
                                            class="theme1-text-input rounded-0" value="{{ request()->s }}">
                                        <label for="search-update-input"
                                            class="placeholder-label text-gray-300 ts-gray-2 px-2">Txn Ref
                                        </label>

                                    </div>
                                    <div class="simple-pagination" data-paginator="updates">
                                        <a id="search-update-button"
                                            class="paginator-link px-3 py-2 bg-purple-500 hover:scale-110 transition-all"
                                            data-link="{{ route('admin.updates.index') }}" href="">Search</a>
                                    </div>
                                </div>
                            </div>
                            @forelse ($updates as $update)
                                <div
                                    class="ts-gray-3 p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer">
                                    <div class="w-full flex justify-between">
                                        <p>User</p>
                                        <p>{{ $update->user?->name }}</p>
                                    </div>
                                    <div class="w-full flex justify-between">
                                        <p class="text-xs">Hash/ID</p>
                                        <p>{{ $update->paymenthash }}</p>
                                    </div>
                                    <div class="w-full flex justify-between items-center">
                                        <div class="">
                                            <p class="local-time">{{ date('d-m-y H:i:s', strtotime($update->created_at)) }}
                                            </p>
                                            <p class="font-bold text-mono">{{ formatAmount($update->amount) }}</p>

                                        </div>

                                        <div class="">
                                            <p class="flex justify-end items-center space-x-1">
                                                @if ($update->status == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                                        fill="currentColor" class="bi bi-patch-exclamation-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    <span
                                                        class="text-gray-500 uppercase text-xs">Pending</span>
                                                @elseif ($update->status == 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500"
                                                        fill="currentColor" class="bi bi-patch-check-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                    </svg>
                                                    <span
                                                        class="text-green-500 uppercase text-xs">Completed</span>
                                                @endif
                                            </p>
                                            <p class="flex justify-end">
                                                <button
                                                    data-link="{{ route('admin.updates.view', ['id' => $update->id]) }}"
                                                    class="view-single-update flex space-x-1 items-center text-white  hover:scale-110 transition-all hover:text-white bg-purple-500 px-1 rounded-full text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg>
                                                    <span>View</span>
                                                </button>


                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div
                                    class="w-full flex justify-center items-center ts-gray-3 p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500"
                                        fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span>Empty Record. No Payment found!</span>
                                </div>
                            @endforelse





                            <div class="w-full flex items-center ts-gray-3 p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer simple-pagination"
                                data-paginator="updates">
                                {{ $updates->links('paginations.simple') }}
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
        // search update
        $(document).on('input keyup', '#search-update-input', function(e) {
            var ref = $(this).val();
            var base_link = $('#search-update-button').data('link');
            var encodedRef = encodeURIComponent(ref);

            // Append the query parameter to the URL
            var link = base_link + '?s=' + encodedRef;
            $('#search-update-button').attr('href', link);
        });

        let interval;
        //single update
        $(document).on('click', '.view-single-update', function(e) {
            var clicked = $(this);
            clicked.addClass('relative disabled');
            clicked.append('<span class="button-spinner"></span>');
            clicked.prop('disabled', true);
            var link = $(this).data('link');
            $('#single-display-new-update-information').removeClass('hidden');
            var html = $('#single-display-new-update-information');


            $.ajax({
                url: link,
                method: 'GET',
                success: function(response) {
                    var update = response.update;

                    Swal.fire({
                        html: `
                        <div class="mt-5" id="single-display-new-update-information">
                            <div>
                                <div class="ts-gray-1 p-2 w-full rounded-lg border border-slate-800 hover:border-slate-600">
                                    <div class="w-full flex justify-between items-center mb-2">

                                        <div id="single_wallet_qrcode" class="clipboard" data-copy=""></div>
                                        <div class="ts-gray-3 rounded-lg p-1">
                                            <form action="admin.updates.process" class="mt-5 gen-form" data-action="reload" id="processForm">
                                                @csrf
                                                <div class="grid grid-cols-1 mb-2">
                                                    <div class="relative">

                                                        <span class="theme1-input-icon material-icons">
                                                            merge_type
                                                        </span>
                                                        <select name="action" placeholder="Action" id="action" class="theme1-text-input"
                                                            {!! is_required('name', false) !!}>
                                                            <option disabled selected >Choose Action
                                                            </option>
                                                            <option value="approve" >Approve
                                                            </option>

                                                            <option value="delete" >Delete
                                                            </option>

                                                        </select>
                                                        <label for="type" class="placeholder-label text-gray-300 ts-gray-2 px-2">Action
                                                            {!! is_required('name') !!}</label>
                                                        <span class="text-xs text-red-500">
                                                            @error('type')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>

                                                <button type="submit" class="mt-5 mb-5 bg-purple-500 text-white px-2 py-1 rounded-full text-xs hover:scale-110 transition-all uppercase" type="submit">Process</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="w-full text-mono text-sm break-all">
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Status </h2>
                                            <h2 class="font-bold"> <span id="single_display_update_status"></span>
                                            </h2>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <h2>Hash ID </h2>
                                            <h2 class="font-bold"> <span id="single_display_update_paymenthash"></span>
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
                    for (var key in update) {
                        if (update.hasOwnProperty(key)) {
                            var value = update[key];
                            var element = $('#single_display_update_' + key);
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
                        text: update.paymenthash,
                        width: 128,
                        height: 128
                    });

                    var walletQrCodeDiv = document.getElementById('single_wallet_qrcode');
                    walletQrCodeDiv.setAttribute('data-copy', update.paymenthash);
                    var imageElement = walletQrCodeDiv.querySelector('img');
                    imageElement.classList.add('rounded-lg', 'border', 'border-slate-800',
                        'hover:border-slate-600', 'cursor-pointer', 'p-1');
                    //imageElement.setAttribute('style', '');

                    //create a count down

                    if (interval) {
                        clearInterval(interval);
                    }

                    interval = setInterval(function() {
                        updateCountdown(targetId, targetDateString);
                    }, 1000);


                    if (update.status !== 0 ) {
                        $("#action option[value='approve'], #action option[value='delete']").remove();
                    }



                },
                complete: function() {
                    clicked.removeClass('disabled');
                    clicked.find('.button-spinner').remove();
                    clicked.prop('disabled', false);

                }
            });


        });
    </script>
@endsection
