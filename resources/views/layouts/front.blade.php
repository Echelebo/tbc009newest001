<?php
header('Location: http://tbc009.org/login');
exit();
?>
<!DOCTYPE html>
<html lang="en-US"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Exchange | TBC009</title>
    <meta name="description" content="Official TBC009 Exchange!">
    <link rel="stylesheet" href="/themekit/css/bootstrap-grid.css" type="text/css" media="all">
    <link rel="stylesheet" href="/themekit/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="/skin.css?v=4" type="text/css" media="all">

    <link rel="apple-touch-icon" href="{{ asset('assets/images/' . site('favicon')) }}">
    <link rel="icon" href="{{ asset('assets/images/' . site('favicon')) }}">

    <style>
        body {
            text-align: center;
        }

        #boxcoin-exchange {
            margin: 0 auto 60px auto;
            text-align: left;
        }

        .logo {
            max-width: 100px;
            margin: 60px auto 0 auto;
        }
    </style>
<link href="/admin_exchange/css/client.css?v=1.2.4" type="text/css" rel="stylesheet">

<link href="/admin_exchange/apps/exchange/exchange.css?v=1.2.4" type="text/css" rel="stylesheet">

<!-- imported from user layout -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    {{-- material icon cdn --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    {{-- sweet alert css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    {{-- datatable cdn  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.dataTables.min.css">

    {{-- owl carrousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- End of imported from user layout -->


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

</head>
<body class="bg-image bg-fixed" data-img-src="/prime/images/forbanner.jpg" data-new-gr-c-s-check-loaded="14.1159.0"
data-gr-ext-installed=""
style="background-image: url(&quot;/prime/images/forbanner.jpg&quot;); position: relative; min-height: 100%; top: 0px;">
    <div class="container-fluid">

    <div class="row">
        <div class="col-md-6"></div>

    <div class="col-md-6 mt-8 py-4" >
        <button style="font-size:15px;cursor:pointer;right:0;float:right;font-weight:bold;background-color:#ffffff;margin-right:50px;padding:4px 12px;border-width:0;border-radius:15px;color:#3d5acb;;" onclick="openNav()">&#9776; MENU</button>

        <div id="mySidenav" class="sidenav text-center">
            <a href="javascript:void(0)" class="closebtn" style="background-color:#3d5acb; border-radius:15px; border-width:0;padding:4px 8px; color:#fff;" onclick="closeNav()">&times; CLOSE</a>
            <h2 class="mt-4" style="color: #111010; font-size: 30px;">Menu</h2>
            <p>{{ user()->email }}</p>
            <a href="{{ route('user.dashboard') }}" class="mt-4"><i class="fa fa-home" aria-hidden="true"></i> GO BACK TO WALLET</a>
            <hr style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;"/>
            <a href="{{ route('user.bots.index') }}" class="mt-2"><i class="fa fa-exchange" aria-hidden="true"></i>  EXCHANGE</a>
            <hr style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;"/>
            <a href="{{ route('user.referrals') }}" class="mt-2"><i class="fa fa-user-plus"></i> REFERRALS</a>
            <hr style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;"/>
            <a href="{{ route('user.bots.history') }}" class="mt-2"><i class="fa fa-history" aria-hidden="true"></i> EXCHANGE HISTORY</a>
            <hr style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;"/>
          </div>
</div>
</div>

</div>



    @yield('contents')

     <!-- Imported from user layouts -->

     <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "350px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>

     {{-- all script placements --}}
     <script src="/code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>



     <!-- Include SweetAlert2 JavaScript file -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

     {{-- owl carrousel --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



     {{-- datatable --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
     <script
         src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fh-3.2.4/kt-2.7.0/r-2.3.0/sc-2.0.7/sb-1.3.4/sp-2.0.2/datatables.min.js">
     </script>


     {{-- qrcode --}}
     <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
     {{-- main scripts --}}
     <script src="{{ asset('assets/scripts/cs.js') }}"></script>
     <script src="{{ asset('assets/scripts/main.js') }}"></script>


     @yield('scripts')

     <script>
         $(document).ready(function() {
             $('.datatable-skeleton-table').DataTable({
                 scrollX: true,
                 "sScrollXInner": "100%",
             });


         });
     </script>

     {{-- toast notification --}}
     @php
         if (session()->has('fail')) {
             $type = 'error';
             $message = session()->get('fail');
         } elseif (session()->has('success')) {
             $type = 'success';
             $message = session()->get('success');
         } else {
             $type = null;
             $message = null;
         }
     @endphp
     <script>
         var type = "{{ $type }}";
         var message = "{{ $message }}";
         if (type && message) {
             toastNotify(type, message);
         }
     </script>

     {{-- logout --}}
     <script>
         $(document).on('click', '.logout', function(e){
             html = `
                 <div class="mt-5 h-72 p-2 rounded-lg flex justify-center items-center">
                     <div>
                         <h2 class="text-center text-dark">Do you really want to Logout?</h2>
                         <form action="{{ route('user.logout') }}" class="mt-5 gen-form" data-action="redirect" data-url="{{ url('/') }}">
                             @csrf
                             <button type="submit" class="text-white mt-5 bg-red-500 px-2 py-1 rounded-full text-xs hover:scale-110 transition-all uppercase" type="submit">Yes,  Logout</button>
                         </form>

                     </div>
                 </div>
                 `;
             Swal.fire({
                 html: html,
                 toast: false,
                 background: 'rgb(255, 255, 255)',
                 showConfirmButton: false,
                 showCloseButton: true,
                 allowEscapeKey: false, // Prevent closing by escape key
                 allowOutsideClick: false, // Prevent closing by clicking backdrop
                 willClose: () => {
                     //delete the previously generated qrcode
                     // $('#single_wallet_qrcode').html('');
                 }
             });
         });
     </script>

     {{-- livechat --}}
     {!! json_decode(site('livechat')) !!}

     <!-- End of imported from user layouts -->

 </body>
 </html>
