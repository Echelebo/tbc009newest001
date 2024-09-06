@php

use App\Models\DepositCoin;

$logos = DepositCoin::inRandomOrder()
        ->take(20)
        ->get('logo_url');
    
    $page_title = 'Services ' . site('name');
    $short_description = site('name') . ' uses advanced Ai robots trained on extensive trading data and algorithms to analyze market trends and execute profitable trades with high precision.';
    
@endphp

{{-- layout --}}
@extends('layouts.front')





@section('contents')
    {{-- breadcrumb --}}
    @include('pages.breadcrumb')
    
    
    <!-- ===============>> Service section start here <<================= -->
  <section class="service padding-top padding-bottom bg-color-7">
    <div class="section-header section-header--max50">
      <h2 class="mb-10 mt-minus-5" style="font-size: 3rem; font-weight: bold;"><span class="style2">services </span>We offer</h2>
      <p>We offer the best services around - from trading to market analysis, Data-Driven Triumph, and more!</p>
    </div>
    <div class="container">
      <div class="service__wrapper">
        <div class="row g-4 align-items-center">
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="800">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/1.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}">Strategic Consulting</a> </h5>
                  <p class="mb-0">A social assistant that's flexible can accommodate your schedule and needs, making
                    life easier.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1000">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/2.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}"> Financial Advisory</a> </h5>
                  <p class="mb-0">Modules transform smart trading by automating processes and improving decision-making.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1200">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/3.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}">Management</a> </h5>
                  <p class="mb-0">There, it's me {{site('name')}}, your friendly neighborhood trading analyst with high precision.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="800">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/4.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}">Supply Optimization </a>
                  </h5>
                  <p class="mb-0">Hey, have you checked out {{site('name')}} cryptocurrency platform? It's pretty cool and easy
                    to use!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1000">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/5.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}">HR consulting</a> </h5>
                  <p class="mb-0">Hey guys, just a quick update on trading orders. There have been some changes
                    in crypto-currencies!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1200">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img class="dark" src="/asset/images/service/6.png" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5 style="font-size: 1.5rem; font-weight: bold;"> <a class="stretched-link" href="{{route('service')}}">Marketing consulting</a>
                  </h5>
                  <p class="mb-0">Hey! Just wanted to let you know that the telegram trading notification module system is now
                    live!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> Service section start here <<================= -->



<section class="w-full px-5 md:px-20 py-5">
         
        <div class="container grid grid-cols-1 relative">
            <div class="w-full-x">

                <div class="mt-10 w-full-x">
                    <div class="w-full-x grid-x grid-cols-1-x gap-1-x text-center">
                        
                        
                        <div class="sp_theme_top_caption" ><i class="fas fa-bolt"></i>Getting started</div>
                <h2 class="sp_theme_top_title" style="font-weight: bold;">How It <span>Works</span></h2>
                        
                        <div class="w-full p-3 flex justify-center">
                            <p class="text-xl text-gray-300 w-full md:w-3/4">
                                Our user-friendly interface and intuitive features ensure that even newcomers can quickly grasp the essentials and embark on a seamless journey into the world of efficient and profitable trading.
                            </p>
                        </div>

                    </div>

                    <div class="w-full md:flex justify-start">
                        <div class="flex justify-center items-center w-full md:w-110">
                            <div class="h-60 md:h-110 w-60  md:w-110 flex justify-center items-center" id="hows-bot">
                                <div class="w-60 md:w-110 h-60 md:h-110 hows-bg animate-circle">

                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="w-full">
                                <div class="h-12"></div>
                                <div class="w-full md:w-3/4">
                                    <div class="w-full grid grid-cols-1 gap-3">
                                        <div class="w-full flex justify-start items-center space-x-2">
                                            <div
                                                class="w-full flex justify-start rounded-lg overflow-hidden overflow-hidden shadow border border-slate-800 hover:border-slate-600 cursor-pointer transition-all">
                                                <div class="flex items-center justify-center p-3 h-24 ">
                                                    <img class="w-16 bg-orange-500  rounded-full p-1"
                                                        src="{{ asset('assets/images/hows/1.png') }}" alt="">
                                                </div>
                                                <div class="p-3 h-24 overflow-hidden w-full ts-gray-3">
                                                    <h6 class=" rescron-bold-font" style="font-weight: bold;">Step 1: Sign Up</h6>
                                                    <p class="text-gray-300" style="font-size: 13px;">Signing up is a breeze - just a few clicks,
                                                        and you're in.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full flex justify-start items-center space-x-2">
                                            <div
                                                class="w-full flex justify-start rounded-lg overflow-hidden overflow-hidden shadow border border-slate-800 hover:border-slate-600 cursor-pointer transition-all">
                                                <div class="flex items-center justify-center p-3 h-24 ">
                                                    <img class="w-16 bg-green-500  rounded-full p-1"
                                                        src="{{ asset('assets/images/hows/2.png') }}" alt="">
                                                </div>
                                                <div class="ts-gray-3 p-3 h-24 overflow-hidden w-full">
                                                    <h6 class="rescron-bold-font" style="font-weight: bold;">Step 2: Deposit Funds</h6>
                                                    <p class="text-gray-300" style="font-size: 13px;">Add money to your {{ site('name') }}
                                                        following our user friendly funding system</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full flex justify-start items-center space-x-2">
                                            <div
                                                class="w-full flex justify-start rounded-lg overflow-hidden overflow-hidden shadow border border-slate-800 hover:border-slate-600 cursor-pointer transition-all">
                                                <div class=" flex items-center justify-center p-3 h-24 ">
                                                    <img class="w-16 bg-blue-500  rounded-full p-1"
                                                        src="{{ asset('assets/images/hows/3.png') }}" alt="">
                                                </div>
                                                <div class="p-3 ts-gray-3 h-24 overflow-hidden w-full">
                                                    <h6 class="rescron-bold-font" style="font-weight: bold;">Step 3: Activate Trade</h6>
                                                    <p class="text-gray-300" style="font-size: 13px;">Select from our wide range of trading portfolio
                                                        and activate.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full flex justify-start items-center space-x-2">
                                            <div
                                                class="w-full flex justify-start rounded-lg overflow-hidden overflow-hidden shadow border border-slate-800 hover:border-slate-600 cursor-pointer transition-all">
                                                <div class="flex items-center justify-center p-3 h-24 ">
                                                    <img class="w-16 bg-purple-500  rounded-full p-1"
                                                        src="{{ asset('assets/images/hows/4.png') }}" alt="">
                                                </div>
                                                <div class="ts-gray-3 p-3 h-24 overflow-hidden w-full">
                                                    <h6 class="rescron-bold-font" style="font-weight: bold;">Step 4: Withdraw</h6>
                                                    <p class="text-gray-300" style="font-size: 13px;"> Withdraw your capital and profits to your
                                                        external wallet at anytime.</p>
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
    </section>
<!-- how work section end -->

<!-- ===============>> cta section start here <<================= -->
  <section class="cta cta--style2">
    <div class="container">
      <div class="cta__wrapper">
        <div class="cta__newsletter justify-content-center">
          <div class="cta__newsletter-inner" data-aos="fade-up" data-aos-duration="1000">
            <div class="cta__thumb">
              <img src="/asset/images/cta/3.png" alt="cta-thumb">
            </div>
            <div class="cta__subscribe">
              <h2 class="mb-0"> <span>Subscribe</span> to our news</h2>
              <p>Hey! Are you tired of missing out on our updates? Subscribe to our news now and stay in the loop!</p>
              <form class="cta-form cta-form--style2 form-subscribe" action="#">
                <div class="cta-form__inner d-sm-flex align-items-center">
                  <input type="email" class="form-control form-control--style2 mb-3 mb-sm-0"
                    placeholder="Email Address">
                  <button class="trk-btn  trk-btn--large trk-btn--secondary2" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> cta section start here <<================= -->


                
                    

                </div>

    

    
@endsection

@section('scripts')
@endsection
