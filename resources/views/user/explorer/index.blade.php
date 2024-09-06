@extends('layouts.user')
<style>

    .sidenav {
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 20px;
}

.sidenav a {
  padding: 8px 8px 8px 16px;
  text-decoration: none;
  font-weight: bold;
  font-size: 15px;
  color: #111010;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #015697;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 15px;
  margin-left: 20px;
}

.wallettext {
    font-size:18px;
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1605px) {
    .wallet-area {
    margin: auto;
    width:60%;
}
.tranx-area {
    margin: auto;
    width: 80%;
}
}

@media screen and (max-height: 480px) {
  .sidenav {padding-top: 9px;}
  .sidenav a {font-size: 13px;}
  .wallet-area {
    width:100%;
}
.tranx-area {
    width:100%;
}
.wallettext {
    font-size:12px;
}
}

</style>
@section('contents')
    <div class="container-fluid" >


        <div class="row content">


            <div class="col-sm-12">
                <div class="card my-4" style="background-color:#fff; color:#111010">
                    <!--<h5 class="card-header bg-primary text-white">Dashboard</h5>-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-3" style="padding-left: 20px; display:none;">
                                <h2><font color="#111010" size="4"><b>Hello, {{ user()->name }}</b><br />({{ user()->email }})</font></h2>
                                <br />
                                <select id="chooserate" class="form-control form-control-lg" style="background: #fff;width:50%;">
                                    <option value="40">TBC</option>
                                    <option value="41">Kringle</option>
                                    <option value="42">USD</option>
                                </select>


                                </div><div class="col-md-3">
                                </div>
                            <div class="col-md-6 py-4">
                                <button style="font-size:15px;cursor:pointer;right:0;float:right;font-weight:bold;background-color:#3d5acb;margin-left:20px;padding:4px 12px;border-width:0;border-radius:15px;color:#fff;" onclick="openNav()">&#9776; MENU</button>

                                <div id="mySidenav" class="sidenav text-center">
                                    <a href="javascript:void(0)" class="closebtn" style="background-color:#3d5acb; border-radius:15px; border-width:0;padding:4px 8px; color:#fff;" onclick="closeNav()">&times; CLOSE</a>
                                    <h2 class="mt-4" style="color: #111010; font-size: 30px;">Menu</h2>
                                    <p>{{ user()->email }}</p>
                                    <a href="{{ route('user.dashboard') }}" class="mt-4"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
                                    <hr style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;"/>
                                    <a href="{{ route('user.updates.index') }}" class="mt-2"><i class="fa fa-bell" aria-hidden="true"></i> UPDATES</a>
                                    <hr style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;"/>
                                    <a href="{{ route('user.explorer.index') }}" class="mt-2"><i class="fa fa-search"></i> EXPLORER</a>
                                    <hr style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;"/>
                                    <a href="{{ route('user.recovery.index') }}" class="mt-2"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT BALANCE RECOVERY REQUEST</a>
                                    <hr style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;"/>
                                    <a class="mt-2 logout"><i class="fa fa-sign-out"></i> LOGOUT</a>
                                    <hr style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0;margin: auto; text-align:center;"/>
                                  </div>
                        </div>

                        </div>
                        <div class="row mt-12">
                            <div class="col-md-12 text-center">
                                <div class="wallet-area">
                                    <div class="row mt-24">
                                        <div class="col-md-12">

                                            <p align="center"><font size="5" style="bold">Explorer</p>

                                                <div class="flex justify-end mb-5">
                                                    <div class="flex justify-end items-center  mb-2 mt-5">
                                                        <div class="relative">

                                                            <span class="theme1-input-icon material-icons">
                                                                search
                                                            </span>
                                                            <input type="text" placeholder="Wallet" id="search-transaction-input"
                                                                class="py-2 pr-4 text-sm text-topbar-item bg-topbar border border-topbar-border rounded pl-8 placeholder:text-slate-400 form-control focus-visible:outline-0 min-w-[300px] focus:border-blue-400 group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-border-dark group-data-[topbar=dark]:placeholder:text-slate-500 group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-border-brand group-data-[topbar=brand]:placeholder:text-blue-300 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:border-zink-500 group-data-[topbar=dark]:dark:text-zink-100 rounded-0" value="{{ request()->s }}">
                                                            <label for="search-transaction-input"
                                                                class="placeholder-label text-gray-300  px-2">Wallet
                                                            </label>

                                                        </div>
                                                        <div class="simple-pagination" data-paginator="transactions">
                                                            <a id="search-transaction-button"
                                                                class="paginator-link px-3 py-2 bg-blue-500 hover:scale-110 transition-all"
                                                                data-link="{{ route('user.explorer.index') }}" href="">Search</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                @forelse ($transactions as $transaction)
                                            <div class="tranx-area mt-4" style="border-width:3px; border-radius:15px;">
                                                        <div class="row" >
                                                             <div class="col-2">
                                                            @if ($transaction->type == "debit")
                                                              <img src="/prime/assets/images/debit.png" class="center" style="width:50%; margin: auto; margin-top: 50px;">
                                                              @else
                                                              <img src="/prime/assets/images/credit.png" class="center" style="width:50%; margin: auto; margin-top: 50px;">
                                                              @endif
                                                                </div>
                                                             <div class="col-10 p-4 text-left">
                                                                  <h4 style="color:#111010; font-size:30px;">{{ number_format($transaction->amount) }} Kringle</h4>
                                                                      <p style="font-size:20px;">{{$transaction->description}}</p>
                                                                                <span style="font-size:15px;">{{ date('d-m-y H:i:s', strtotime($transaction->created_at)) }}</span>

                                                            </div>
                                                        </div>


                                                                        </div>

                                                                        @empty

                                            <div></div>
                                            @endforelse
                                            <div class="w-full flex items-center  p-2 rounded-lg border border-slate-800 hover:border-slate-600 cursor-pointer simple-pagination"
                                            data-paginator="transactions">
                                            {{ $transactions->links('paginations.simple') }}
                                        </div>


                                                                        </div>

                                                            </div>


</div>
                            </div>
                            </div>

                            </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



        <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


<script>
    $(document).on('submit', '#tbctransferForm', function(e) {
            e.preventDefault();
            var amount = $('#amount').val() * 1;
            var currency = $('#pay_currency').val() * 1;

            //check the currency code
            var error = null;
            //check min and max transfer

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

<script>
    // search transaction
    $(document).on('input keyup', '#search-transaction-input', function(e) {
        var ref = $(this).val();
        var base_link = $('#search-transaction-button').data('link');
        var encodedRef = encodeURIComponent(ref);

        // Append the query parameter to the URL
        var link = base_link + '?s=' + encodedRef;
        $('#search-transaction-button').attr('href', link);
    });


</script>

@endsection
