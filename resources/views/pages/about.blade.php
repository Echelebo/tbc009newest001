@php

use App\Models\DepositCoin;

$logos = DepositCoin::inRandomOrder()
        ->take(20)
        ->get('logo_url');

    $page_title = 'About ' . site('name');
    $short_description = site('name') . ' uses advanced Ai robots trained on extensive trading data and algorithms to analyze market trends and execute profitable trades with high precision.';

@endphp

{{-- layout --}}
@extends('layouts.front')





@section('contents')
    {{-- breadcrumb --}}
    <!-- Page title -->
    <div class="d-flex flex-column w-100">
        <div class="page-title d-flex align-items-center bg-image py-5" data-img-src="/prime/assets/images/upload/page-title-bg-01.jpg" style="background-image: url(&quot;/prime/assets/images/upload/page-title-bg-01.jpg&quot;);">
            <div class="container page-title-container">
                <div class="row py-5">
                    <div class="col text-center">

                        <h1 class="display-3 font-weight-800 text-white mb-0">
                            About Us
                        </h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-light-2 justify-content-center mb-0">
                                <li class="breadcrumb-item text-uppercase"><a href="{{route('home')}}">Homepage</a></li>
                                <li class="breadcrumb-item text-uppercase text-nowrap active" aria-current="page">About Us</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="main-content py-0">

         <div class="section py-5">
            <div class="container">

                <div class="row align-items-center py-4 my-5">

                    <div class="col-lg-6">
                        <div class="pt-lg-3 pr-lg-5 mb-5 mb-lg-0">

                            <h2 class="h1 section-title-3 text-left font-weight-800 mb-5">Why Choose Us</h2>

                            <div data-height="10px" style="height: 10px;"></div>

                            <p>
                                We have over 180 investment professionals covering different sectors and are present globally. This long-established network of people and offices, along with a substantial industrial presence arising from our portfolio of companies, generate the depth and breadth of insight and intelligence to allow Bridgepoint to pursue the best opportunities and support the best companies.

After we’ve invested, we serve on portfolio company boards, providing advice to executives, sharing expertise and experience as well as adding value by participating in a business’s strategic development. In return, we motivate the managers we back through equity participation so that they can realise significant financial rewards for the value they create.
                            </p>
                            <p>As a firm, our sustained success is based on the ability of our people to be at their best. We want our people to be themselves, be bold, share their unique differences and form deep relationships that are rooted in trust. We get the best from our people when they find meaning and purpose in their work and see how their own values and aspirations can be brought to life through what they do at Ligrace Invest Limited.</p>

                            <a href="{{route('user.register')}}" class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">View Company Registration</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="animated fadeInUp" data-animated="fadeInUp">

                                    <div class="d-none d-md-block" data-height="95px" style="height: 95px;"></div>

                                    <img src="/prime/assets/images/upload/about-why-us-01.jpg" alt="image" class="img-fluid rounded-lg shadow-lg">

                                    <div data-height="30px" style="height: 30px;"></div>

                                    <img src="/prime/assets/images/upload/about-why-us-02.jpg" alt="image" class="img-fluid rounded-lg shadow-lg">

                                    <div class="d-md-none" data-height="30px" style="height: 30px;"></div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="animated fadeInUp" data-animated="fadeInUp">

                                    <img src="/prime/assets/images/upload/about-why-us-03.jpg" alt="image" class="img-fluid rounded-lg shadow-lg">

                                    <div data-height="30px" style="height: 30px;"></div>

                                    <img src="/prime/assets/images/upload/about-why-us-04.jpg" alt="image" class="img-fluid rounded-lg shadow-lg">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div data-height="20px" style="height: 20px;"></div>

            </div>
        </div>

        <!-- Vision Mission and Goal section -->
        <div class="section">
            <div class="container-fluid p-0">
                <div class="row no-gutters">

                    <div class="col-lg-4 bg-image p-5 animated fadeInLeft" data-animated="fadeInLeft" data-img-src="/prime/assets/images/upload/about-us-vision-bg-01.jpg" style="background-image: url(&quot;/prime/assets/images/upload/about-us-vision-bg-01.jpg&quot;);">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="text-white-75 my-2">
                                    <h3 class="h1 text-white font-weight-800">01</h3>
                                    <h4 class="text-white font-weight-800 text-uppercase mb-3">Legal</h4>
                                    <p> Our company conducts absolutely legal activities in the legal field. We are certified to operate investment business, we are legal and safe.  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 bg-image p-5 animated fadeInUp" data-animated="fadeInUp" data-img-src="/prime/assets/images/upload/about-us-vision-bg-02.jpg" style="background-image: url(&quot;/prime/assets/images/upload/about-us-vision-bg-02.jpg&quot;);">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="text-white-75 my-2">
                                    <h3 class="h1 text-white font-weight-800">02</h3>
                                    <h4 class="text-white font-weight-800 text-uppercase mb-3">Trusted</h4>
                                    <p>We are trusted by a huge number of people. We are working hard constantly to improve the level of our security system and minimize possible risks.  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 bg-image p-5 animated fadeInRight" data-animated="fadeInRight" data-img-src="/prime/assets/images/upload/about-us-vision-bg-03.jpg" style="background-image: url(&quot;/prime/assets/images/upload/about-us-vision-bg-03.jpg&quot;);">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="my-2">
                                    <h3 class="h1 text-indigo font-weight-800">03</h3>
                                    <h4 class="font-weight-800 text-uppercase mb-3">24/7 Support</h4>
                                    <p>We provide 24/7 customer support through e-mail and livechat. Our support representatives are available to elucidate any difficulty. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Why Us section -->


        <!-- Call to action section -->

        <div class="bg-light">

            <!-- Subscribe section -->

            <!-- Team section -->
            <div class="section py-5">
                <div class="container">

                    <div class="row my-5">
                        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                            <div class="text-center mt-2 mb-4">
                                <h2 class="h1 section-title-3 font-weight-800">Our corporate responsibility</h2>
                                <div class="lead-sm pt-2">
                                    We build trust and solve important problems
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mb-lg-12">

                        <div class="col-md-12 col-lg-12">
                            <p> At Ligrace Invest Limited, we've identified that our overall purpose as an organisation is to build trust in society and solve important problems. This approach informs every aspect of our work and underpins the relationships we build with our clients. Just one of the ways we demonstrate this is through our Corporate Responsibility efforts. All of our projects are designed to use the skills and experience of our people to make the greatest difference possible.

 </p><p>That is why we are focusing our diversity efforts on gender and ethnicity. We've made a number of key local and international partnerships, with organisations and company around the glove</p>

 <p>We are also proud of our commitment to creating a safe, welcoming and inclusive work place for employees with diverse gender identity and sexual orientation. Every day, our Team (Shine) members shine the light on important issues in society and we work hard to make our culture stronger and to create brighter opportunities that let each and every one of us truly shine.</p>

 <p>Not only do these efforts reflect the incredibly diverse makeup of The United States, but they align with our vision of what a professional services firm has to be if it is going to make a positive change to society. </p>
                        </div>

                    </div>

                </div>
            </div>

        </div>



    </div>




@endsection

@section('scripts')
@endsection
