@php
    use App\Models\Bot;
    
    $page_title = 'AI Bot Pricing';
    $short_description = 'We have vering portfolio ranges for our bots. Select any hat best fits your pocket';
    $bots = Bot::get();
    
@endphp

{{-- layout --}}
@extends('layouts.front')





@section('contents')
    <div class="d-flex flex-column w-100">
        <div class="page-title d-flex align-items-center bg-image py-5" data-img-src="/prime/assets/images/upload/page-title-bg-22.jpg" style="background-image: url(&quot;/prime/assets/images/upload/page-title-bg-22.jpg&quot;);">
            <div class="container page-title-container">
                <div class="row py-5">
                    <div class="col text-center">

                        <h1 class="display-3 font-weight-800 text-white mb-3">
                           Investment Plans
                        </h1>

                        <div class="row">
                            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                                <div class="lead text-white-75">
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

   
  <div class="main-content bg-light pb-0">
            <!-- Pricing tables with image background -->
            <div class="section bg-white py-5">
                <div class="container">

                    <div class="row pt-4 pb-5 my-5">
                        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                            <div class="text-center">

                                <h2 class="h1 section-title-3 font-weight-800">Plans</h2>

                                <div class="lead-sm pt-2">
                                    Investment Plans
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row pb-3 mb-5">
@foreach ($bots as $bot)
                    

                        <div class="columns">
                            <ul class="price" style="margin-left: 0px;">
                                <li class="header">{{ $bot->name }}</li>
                                <li class="grey">Min Amount: ${{ $bot->min }}</li>
                                <li>Max Amount: @if($bot->max >= 100000000) UNLIMITED @else ${{ number_format($bot->max) }}@endif</li>
                                <li>Profit: {{ $bot->daily_min }}% Daily</li>
                                <li>Duration: {{ $bot->duration }} {{ $bot->duration_type }}</li>
                                <li>Referral Bonus: @if($bot->max >= 100000000) 10% @else 5% @endif</li>
                                <li class="grey"><a href="{{route('user.register')}}" class="button">Sign Up</a></li>
                            </ul>
                        </div>

                    
@endforeach
</div>
                </div>
            </div>
        </div>
  <!-- ===============>> Pricing section start here <<================= -->
@endsection

@section('scripts')
@endsection
