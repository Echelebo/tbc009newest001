@php
    use App\Models\DepositCoin;
    use App\Models\Bot;
    use Faker\Factory as Faker;

    $page_title = 'Home';
    $faker = Faker::create();
    $logos = DepositCoin::inRandomOrder()->take(20)->get('logo_url');

    $bots = Bot::get();

    $deposit_methods = ['usdttrc20'];
    $methods = DepositCoin::where('status', 1)->get();
    foreach ($methods as $method) {
        array_push($deposit_methods, $method->code);
    }

    // Check if the count is less than 20
    while (count($deposit_methods) < 20) {
        $deposit_methods[] = 'usdttrc20';
    }

    $actions = [
        'deposited',
        'withdrew',
        'withdrew',
        'deposited',
        'withdrew',
        'deposited',
        'withdrew',
        'withdrew',
        'withdrew',
        'withdrew',
        'withdrew',
        'withdrew',
    ];

    $whys = [
        'Cutting-Edge Precision',
        'Trendsetter Advantage',
        'Adaptive Excellence',
        'Seamless Profits',
        'Data-Driven Triumph',
        'Strategic Partner',
        'Constant Success',
        'Market Pioneer',
        'Automated Mastery',
    ];
    $reviews = [
        site('name') .
        "'s precision trading is a game-changer, consistently delivering impressive profits. I trust it for my financial success.",
        'Effortless trading with ' .
        site('name') .
        '. Its adaptability and data-driven approach make it a standout choice. Highly recommended!',
        'Seamless trades, constant profits - ' .
        site('name') .
        " simplifies trading. It's a must-have for anyone in the market.",
        site('name') .
        "'s innovative strategies and consistent returns have transformed my trading experience. It's a valuable asset to any trader.",
        'I rely on ' .
        site('name') .
        " for its adaptability in fluctuating markets. It's a proven partner in achieving financial goals.",
        site('name') .
        "'s automated precision is remarkable. It's a powerful tool for navigating today's complex trading landscape.",
        'Maximized profits with ' .
        site('name') .
        '. Its results speak volumes. A reliable and intelligent trading companion.',
        'Trading with ' .
        site('name') .
        ' is effortless and rewarding. It adapts to market changes seamlessly. Truly impressive!',
        site('name') .
        ' has changed my trading game. Its data-driven approach delivers consistent gains. An invaluable tool for success.',
        'Effortless trading made possible by ' .
        site('name') .
        ' .  Its strategic prowess sets it apart. A game-changer for traders.',
    ];

    $short_description = site('seo_description');

@endphp

@extends('layouts.front')


@section('contents')
    <!-- Banner slides -->
    <div class="banner-slides-wrapper arrow-nav-overflow" data-dots="true" data-nav="true">

        <div class="banner-slides-container owl-carousel owl-theme owl-dot-light-1 owl-loaded">

            <!-- Slide item -->


            <!-- Slide item -->




            <div class="owl-stage-outer owl-height" style="height: 562.953px;">
                <div class="owl-stage"
                    style="transform: translate3d(-1216px, 0px, 0px); transition: all 0s ease 0s; width: 3648px;">
                    <div class="owl-item cloned" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-01.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-01.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 text-center py-5">
                                            <div class="px-md-5 px-lg-0 px-xl-5 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Your Success is Our Business</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Welcome to<br> Ligrace Holdings Ltd
                                                </h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Our ambition has always been to help
                                                    deliver the message of sustainability for many of our clients.
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item cloned" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-02.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-02.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-6 text-center text-xl-left py-5">
                                            <div class="px-md-5 pr-lg-0 pl-lg-3 ml-lg-n3 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Consulting &amp; Investment</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Get Your Business<br>Right Up There</h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">We believe that to succeed, modern mining
                                                    companies must embrace and integrate environmental, social and
                                                    economic considerations in all business decisions.</div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Signup</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-01.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-01.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 text-center py-5">
                                            <div class="px-md-5 px-lg-0 px-xl-5 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Your Success is Our Business</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Welcome to<br> Ligrace Holdings Ltd
                                                </h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Our ambition has always been to help
                                                    deliver the message of sustainability for many of our clients.
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-02.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-02.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-6 text-center text-xl-left py-5">
                                            <div class="px-md-5 pr-lg-0 pl-lg-3 ml-lg-n3 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Consulting &amp; Investment</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Get Your Business<br>Right Up There</h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">We believe that to succeed, modern mining
                                                    companies must embrace and integrate environmental, social and
                                                    economic considerations in all business decisions.</div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Signup</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item cloned" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-01.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-01.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 text-center py-5">
                                            <div class="px-md-5 px-lg-0 px-xl-5 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Your Success is Our Business</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Welcome to<br> Ligrace Holdings Ltd
                                                </h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Our ambition has always been to help
                                                    deliver the message of sustainability for many of our clients.
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item cloned" style="width: 608px;">
                        <div class="d-flex flex-column">
                            <div class="page-header-block-height d-flex align-items-center bg-image"
                                data-img-src="/prime/assets/images/upload/section-banner-slide-02.jpg"
                                style="background-image: url(&quot;/prime/assets/images/upload/section-banner-slide-02.jpg&quot;);">
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-6 text-center text-xl-left py-5">
                                            <div class="px-md-5 pr-lg-0 pl-lg-3 ml-lg-n3 py-5 overflow-hidden">
                                                <h2 class="h3 font-weight-300 text-white slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">Consulting &amp; Investment</h2>
                                                <h1 class="display-4 font-weight-800 text-white mb-3 slide-animate animated fadeInRight"
                                                    data-animated="fadeInRight">Get Your Business<br>Right Up There</h1>
                                                <div class="lead-sm text-white-75 pb-2 pb-xl-3 mb-5 slide-animate animated fadeInLeft"
                                                    data-animated="fadeInLeft">We believe that to succeed, modern mining
                                                    companies must embrace and integrate environmental, social and
                                                    economic considerations in all business decisions.</div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.login') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Login</a>
                                                </div>
                                                <div class="slide-animate animated fadeIn" data-animated="fadeIn">
                                                    <a href="{{ route('user.register') }}"
                                                        class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2">Signup</a>
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
            <div class="owl-nav">
                <div class="carousel-custom-nav carousel-nav-lg d-none d-lg-block">
                    <a class="carousel-control-prev" href="#" data-width="9%" style="width: 9%;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#" data-width="9%" style="width: 9%;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div><button type="button" role="presentation" class="owl-prev"><span
                        aria-label="Previous">‹</span></button><button type="button" role="presentation"
                    class="owl-next"><span aria-label="Next">›</span></button>
            </div>
            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                    role="button" class="owl-dot"><span></span></button></div>
        </div>

        <!-- Navigation -->


    </div>

    <!-- Content -->
    <div class="main-content pb-0">

        <!-- Our services section -->
        <div class="section">
            <div class="container">

                <div class="row">

                    <div class="col-lg-7 align-self-center">

                        <div class="mt-4 mb-5">

                            <h5 class="font-weight-400">About US</h5>

                            <div data-height="3px" style="height: 3px;"></div>

                            <h2 class="h1 font-weight-800 mb-4">Plan for the future and beyond </h2>

                            <div class="lead-sm">
                                We have over 180 investment professionals covering different sectors and are present
                                globally. This long-established network of people and offices, along with a substantial
                                industrial presence arising from our portfolio of companies, generate the depth and
                                breadth of insight and intelligence to allow Bridgepoint to pursue the best
                                opportunities and support the best companies.

                                After we’ve invested, we serve on portfolio company boards, providing advice to
                                executives, sharing expertise and experience as well as adding value by participating in
                                a business’s strategic development. In return, we motivate the managers we back through
                                equity participation so that they can realise significant financial rewards for the
                                value they create.

                            </div>

                        </div>

                        <div data-height="15px" style="height: 15px;"></div>



                        <div data-height="20px" style="height: 20px;"></div>

                    </div>

                    <div class="col-lg-5 align-self-end">
                        <div class="text-center px-3 px-md-5 px-lg-3">
                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/NDetuRLQso8"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen=""></iframe>

                        </div>
                    </div>

                </div>



            </div>
        </div>

        <!-- Benefits section -->
        <div class="section bg-light pb-5 mt-up75">

            <div class="bg-white" data-height="5px" style="height: 5px;"></div>

            <div class="container pt-5">
                <div class="py-5 my-4">

                    <div data-height="10px" style="height: 10px;"></div>

                    <div class="row align-items-center mt-5">

                        <div class="col-lg-6">
                            <div class="row pb-4 pb-lg-0 mb-5 mb-lg-0">

                                <div class="col-md-6">

                                    <img src="/prime/assets/images/upload/benefit-image-02.jpg" alt="image"
                                        class="img-fluid rounded-lg shadow-lg add-animate" data-animated="fadeInDown">

                                    <div data-height="30px" style="height: 30px;"></div>

                                    <div class="bg-secondary text-white-75 rounded-lg shadow-lg p-4 add-animate"
                                        data-animated="fadeInLeft">

                                        <div class="d-flex align-items-center">
                                            <h2 class="display-4 text-white font-weight-500 mb-0 mr-2">10</h2>
                                            <div class="text-uppercase line-height-md font-weight-500">
                                                Years of<br>Experience
                                            </div>
                                        </div>

                                        <div data-height="106px" style="height: 106px;"></div>

                                        <h4 class="text-white font-weight-700 line-height-sm mb-0">Financial Experience
                                        </h4>

                                    </div>

                                    <div class="d-md-none" data-height="30px" style="height: 30px;"></div>

                                </div>

                                <div class="col-md-6">
                                    <img src="/prime/assets/images/upload/benefit-image-01.jpg" alt="image"
                                        class="img-fluid rounded-lg shadow-lg add-animate" data-animated="fadeInUp">
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="px-xl-5">
                                <div class="pl-lg-3">

                                    <div class="mb-5">

                                        <h5 class="font-weight-400">Our Responsibility</h5>

                                        <div data-height="3px" style="height: 3px;"></div>

                                        <h2 class="h1 font-weight-800 mb-4">Sustainability Approach</h2>

                                        <div class="lead-sm">
                                            At Ligrace Invest Limited, we commit to provide services we render to our
                                            clients. This is why we always try to expand our technical capabilities and
                                            financial turnover with the help of our professional having hands-on
                                            experience guarantees for gaining profit by generating crypto currencies.
                                            Ligrace Invest Limited envisions to widen the pool of investors by
                                            engaging in effective strategic trading of crypto currencies.
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <br><br>


        <br><br>
        <!-- Skills section -->
        <div class="section py-5 bg-image" data-img-src="/prime/assets/images/upload/skills-bg-image-01.jpg"
            style="background-image: url(&quot;/prime/assets/images/upload/skills-bg-image-01.jpg&quot;);">
            <div class="container">
                <div class="row align-items-center py-5 my-xl-3">

                    <div class="col-lg-6">
                        <div class="py-3 pr-lg-4 mb-5 mb-lg-0">

                            <h2 class="display-4 font-weight-300 text-primary mb-1">Our Cores</h2>

                            <h2 class="display-4 font-weight-800 text-white mb-4">And Values</h2>

                            <div class="lead-sm text-white-50 mb-5">
                                As a firm, our sustained success is based on the ability of our people to be at their
                                best. We want our people to be themselves, be bold, share their unique differences and
                                form deep relationships that are rooted in trust. We get the best from our people when
                                they find meaning and purpose in their work and see how their own values and aspirations
                                can be brought to life through what they do at Fintech Invest Limited.
                            </div>

                            <div data-height="10px" style="height: 10px;"></div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="section pt-5 pb-4 pb-xl-0">

            <div class="container">

                <div data-height="54px" style="height: 54px;"></div>

                <div class="row">
                    <h2 class="display-4 font-weight-300 text-primary mb-1">Our Services</h2>

                    <h2 class="display-4 font-weight-800 text-white mb-4">Where we specialize on</h2>

                    <div class="col-md-4">
                        <img src="/prime/images/industries_oilgas-1036.jpg" width="400px;">
                        <h4>Oil And Gas</h4>
                        <p>Surprising as it might be, anyone can invest in the oil market to make a profit. Indeed, the
                            development of online trading platforms has allowed individuals to use their savings to
                            speculate on rising or falling oil </p>
                    </div>

                    <div class="col-md-4">
                        <img src="/prime/images/agriczz.jpg" width="400px;">
                        <h4>Agriculture</h4>
                        <p>Investing in agriculture means putting your money behind food and crop production,
                            processing, and distribution. As the world needs to feed a growing population and with less
                            land, interest in agriculture production as an investment has grown right along with the
                            world population. </p>
                    </div>


                    <div class="col-md-4">
                        <img src="/prime/images/realzz.jpg" width="400px;">
                        <h4>Real Estate</h4>
                        <p>Real estate investment involves the purchase, ownership, management, rental and/or sale of
                            real estate for profit. Improvement of realty property as part of a real estate investment
                            strategy generally. </p>
                    </div>


                </div>

            </div>

            <div class="bg-white mt-up125 d-none d-xl-block" data-height="125px" style="height: 125px;"></div>

        </div>
        <!-- Customer service section -->
        <div class="section bg-indigo pt-5 pb-4 pb-xl-0">

            <div class="container">

                <div data-height="54px" style="height: 54px;"></div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 col-xl-12 offset-xl-0">
                        <div class="pl-xl-4 mb-4 mb-xl-0">

                            <div data-height="15px" style="height: 15px;"></div>

                            <div class="text-white-75 mb-5">

                                <h2 class="h1 font-weight-800 text-white mb-4">Why Choose Us</h2>

                                <div class="lead-sm">
                                    Our experts ensure you benefit from total transparency to achieve control and make
                                    better decisions
                                </div>

                            </div>

                            <div data-height="15px" style="height: 15px;"></div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="icon-info-1 mb-5">
                                        <div class="icon-element">
                                            <img src="/prime/assets/svg/upload/benefit-icon-01.svg" alt="icon"
                                                class="img-fluid add-animate" data-animated="zoomIn" data-width="42px"
                                                data-height="42px" style="width: 42px; height: 42px;">
                                        </div>
                                        <div class="icon-info-text pl-3 text-white-75">
                                            <h5 class="font-weight-700 text-white mb-3">Wealth Management</h5>
                                            <p>


                                                Wealth management is an investment advisory service that combines other
                                                financial services to address the needs of affluent clients. Using a
                                                consultative process, the advisor gleans information about the client’s
                                                wants and specific situation, then tailors a personalized strategy that
                                                uses a range of financial products and services.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="icon-info-1 mb-5">
                                        <div class="icon-element">
                                            <img src="/prime/assets/svg/upload/benefit-icon-02.svg" alt="icon"
                                                class="img-fluid add-animate" data-animated="zoomIn" data-width="42px"
                                                data-height="42px" style="width: 42px; height: 42px;">
                                        </div>
                                        <div class="icon-info-text pl-3 text-white-75">
                                            <h5 class="font-weight-700 text-white mb-3">Invest Management</h5>
                                            <p>


                                                Portfolio management and asset management are other terms that also
                                                broadly refer to services that provide oversight of a client’s
                                                investments. Investment management, however, isn't just about handling
                                                specific assets in a portfolio — it includes ensuring the portfolio
                                                continues to align with the client's goals, risk tolerance and financial
                                                priorities.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="icon-info-1 mb-5">
                                        <div class="icon-element">
                                            <img src="/prime/assets/svg/upload/benefit-icon-03.svg" alt="icon"
                                                class="img-fluid add-animate" data-animated="zoomIn" data-width="42px"
                                                data-height="42px" style="width: 42px; height: 42px;">
                                        </div>
                                        <div class="icon-info-text pl-3 text-white-75">
                                            <h5 class="font-weight-700 text-white mb-3">Asset Management</h5>
                                            <p>


                                                Here we determine what investments to make, or avoid, to realize the
                                                client's financial goals within the limits of the client's risk
                                                tolerance. The investments may include stocks, bonds, real estate,
                                                commodities, alternative investments, and mutual funds, among the
                                                better-known choices.
                                            </p>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>
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
                                    <li class="grey">Min Amount: ${{ number_format($bot->min) }}</li>
                                    <li>Max Amount: @if ($bot->max >= 100000000)
                                            UNLIMITED
                                        @else
                                            ${{ number_format($bot->max) }}
                                        @endif
                                    </li>
                                    <li>Profit: {{ $bot->daily_min }}% Daily</li>
                                    <li>Duration: {{ $bot->duration }} {{ $bot->duration_type }}</li>
                                    <li>Referral Bonus: @if ($bot->max >= 100000000)
                                            10%
                                        @else
                                            5%
                                        @endif
                                    </li>
                                    <li class="grey"><a href="{{ route('user.register') }}" class="button">Sign Up</a>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials section -->
        <!-- Testimonials section -->
        <div class="section pt-5">
            <div class="container">
                <div class="pt-5">
                    <div class="row">

                        <div class="col-lg-5 pb-4 pb-lg-0 mb-5 mb-lg-0">

                            <h2 class="h1 font-weight-800 mb-4">What Clients Say</h2>

                            <div class="lead-sm">
                                Few testimonials of what our clients think about us.
                            </div>

                        </div>

                        <div class="col-lg-6 offset-lg-1">
                            <div class="testimonial-2 pb-4 pb-md-0 mb-5 add-animate" data-animated="fadeInRight">
                                <div class="testimonial-image">
                                    <figure>
                                        <img class="img-fluid"
                                            src="/prime/assets/images/upload/testimonial-thumbnail-1.jpg"
                                            alt="testimonial">
                                    </figure>
                                </div>
                                <div class="testimonial-details">
                                    <div class="font-italic">
                                        <p>Without Ligrace Holdings, we would have gone bankrupt by now. I didn't even
                                            need training. This is simply unbelievable! The best on the net!</p>
                                    </div>
                                    <div class="tesimonial-name">
                                        Bruce Romero
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 offset-lg-3">
                            <div class="testimonial-2 pb-4 pb-md-0 mb-5 add-animate" data-animated="fadeInRight">
                                <div class="testimonial-image">
                                    <figure>
                                        <img class="img-fluid"
                                            src="/prime/assets/images/upload/testimonial-thumbnail-2.jpg"
                                            alt="testimonial">
                                    </figure>
                                </div>
                                <div class="testimonial-details">
                                    <div class="font-italic">
                                        <p>I can't say enough about Ligrace Holdings. Ligrace Holdings has really
                                            helped my life.</p>
                                    </div>
                                    <div class="tesimonial-name">
                                        Linda Murray
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="testimonial-2 mb-5 add-animate" data-animated="fadeInRight">
                                <div class="testimonial-image">
                                    <figure>
                                        <img class="img-fluid"
                                            src="/prime/assets/images/upload/testimonial-thumbnail-3.jpg"
                                            alt="testimonial">
                                    </figure>
                                </div>
                                <div class="testimonial-details">
                                    <div class="font-italic">
                                        <p>Thank you for making it painless, pleasant and most of all hassle free!
                                            Ligrace Holdings is the real deal! I have gotten at least 10 times the
                                            value from Ligrace Holdings.</p>
                                    </div>
                                    <div class="tesimonial-name">
                                        Mark Burdette
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action section -->
        <div class="section">
            <div class="container-fluid p-0">
                <div class="row no-gutters">

                    <div class="col-lg-6 bg-image" data-img-src="/prime/assets/images/cdc-i71ZRcnqqvw-unsplash.jpg"
                        style="background-image: url(&quot;/prime/assets/images/cdc-i71ZRcnqqvw-unsplash.jpg&quot;);">
                        <div class="d-lg-none" data-height="70vw" style="height: 70vw;"></div>
                    </div>

                    <div class="col-lg-6 bg-light p-4 p-md-5">
                        <div class="row no-gutters">
                            <div class="col-md-8 offset-md-2 col-lg-12 offset-lg-0 col-xl-8 offset-xl-2 text-center">

                                <div data-height="100px" style="height: 100px;"></div>

                                <h5 class="font-weight-400">

                                    Don't Hesitate to Invest Now
                                </h5>

                                <div data-height="3px" style="height: 3px;"></div>

                                <h2 class="h1 font-weight-800 mb-3"> We Will Give You The Best!</h2>

                                <div class="lead-sm mb-5">
                                    Our objective is to deliver attractive investment performance over the
                                    medium-to-long-term, enabling clients to meet their investment goals. We do this by
                                    providing cost-effective access to a professionally managed service, supported by
                                    in-depth financial analysis and insights.
                                </div>

                                <div data-height="10px" style="height: 10px;"></div>

                                <a href="{{ route('user.register') }}" class="btn btn-lg btn-round btn-primary mb-0">Join
                                    Us!</a>

                                <div data-height="100px" style="height: 100px;"></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        {{-- spining image --}}

        <script>
            const circle = document.querySelector('.circle');
            const images = document.querySelectorAll('.floating-image');
            const numImages = images.length;
            const deviceWidth = window.innerWidth;

            let radius;
            if (deviceWidth > 766) {
                radius = Math.min(circle.clientWidth / 2, circle.clientHeight / 2) - 25;
            } else {
                radius = deviceWidth; // Use a specific value for small deviceWidth
            }

            function moveImageInCircleAndSpin(img, centerX, centerY, angle) {
                const x = centerX + radius * Math.cos(angle);
                const y = centerY + radius * Math.sin(angle);
                const rotation = angle * (180 / Math.PI);

                img.style.left = `${x}px`;
                img.style.top = `${y}px`;
                img.style.transform = `translate(-50%, -50%) rotate(${rotation}deg)`;

                const newAngle = angle + 0.01; // Adjust the rotation speed here
                const randomDelay = Math.random() * 10; // Small delay to adjust rotation phase
                setTimeout(() => {
                    moveImageInCircleAndSpin(img, centerX, centerY, newAngle);
                }, randomDelay);
            }

            function initializeImagePositions() {
                const centerX = circle.clientWidth / 2;
                const centerY = circle.clientHeight / 2;

                images.forEach((img, index) => {
                    const angle = (index / numImages) * 2 * Math.PI;
                    moveImageInCircleAndSpin(img, centerX, centerY, angle);
                });
            }

            initializeImagePositions();
        </script>


        {{-- moving image --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.looping-image').owlCarousel({
                    loop: true,
                    margin: 5,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    autoplaySpeed: 600,
                    dots: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 5,
                        },
                        600: {
                            items: 10,
                        },
                        1000: {
                            items: 10,
                        }
                    }
                });

                $('.reviews').owlCarousel({
                    loop: true,
                    margin: 5,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    autoplaySpeed: 600,
                    dots: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 1,
                        },
                        1000: {
                            items: 1,
                        }
                    }
                });

                $('.deposits').owlCarousel({
                    loop: true,
                    margin: 5,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplaySpeed: 600,
                    dots: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 1,
                        },
                        1000: {
                            items: 3,
                        }
                    }
                });
            });
        </script>


        {{-- globe --}}
        <script src="//unpkg.com/globe.gl"></script>
        <script>
            fetch("{{ route('places') }}").then(res => res.json()).then(places => {

                const globeInstance = Globe()
                    .globeImageUrl("{{ asset('assets/images/earth-night.jpg') }}")
                    .backgroundImageUrl("{{ asset('assets/images/ts-gray-1.png') }}")
                    .labelsData(places.features)
                    .labelLat(d => d.properties.latitude)
                    .labelLng(d => d.properties.longitude)
                    .labelText(d => d.properties.name)
                    .labelSize(d => Math.sqrt(d.properties.pop_max) * 4e-4)
                    .labelDotRadius(d => Math.sqrt(d.properties.pop_max) * 4e-4)
                    .labelColor(() => 'rgba(255, 165, 0, 0.75)')
                    .labelResolution(2)

                (document.getElementById('globeViz'))


            });
        </script>

        {{-- schuffle recent trades --}}
        <script>
            function updateTradeTimes() {
                const tradeTimeElements = document.querySelectorAll('.recent_trade_time');
                const currentTime = new Date().toLocaleTimeString();

                tradeTimeElements.forEach((element) => {
                    element.textContent = currentTime;
                });
            }

            function shuffleAndDisplayRecentTrades() {
                const tradesDiv = document.getElementById('recentTrades');
                const trades = Array.from(tradesDiv.children);

                trades.sort(() => Math.random() - 0.5); // Shuffle the array

                // Remove the existing trade divs
                while (tradesDiv.firstChild) {
                    tradesDiv.removeChild(tradesDiv.firstChild);
                }

                // Append the first 10 shuffled trade divs back to the container
                for (let i = 0; i < 20 && i < trades.length; i++) {
                    tradesDiv.appendChild(trades[i]);
                }

                updateTradeTimes(); // Update trade times after shuffling
            }

            // Initial shuffle and display
            shuffleAndDisplayRecentTrades();

            // Set interval to shuffle and update times every second (1000 milliseconds)
            setInterval(shuffleAndDisplayRecentTrades, 1000);

            // update every 5 minutes
            function updateRecentTrades() {
                // Use jQuery to make an AJAX request to the server
                $.ajax({
                    url: window.location.href,
                    method: 'GET',
                    dataType: 'html',
                    success: function(response) {
                        // Update the content of the recentTradesContainer div
                        var targetDiv = '#recentTradesContainer';
                        $(targetDiv).html($(response).find(targetDiv).html());
                        updateTradeTimes();
                        $('#deposits').html($(response).find('#deposits').html());

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            setInterval(updateRecentTrades, 10000);
        </script>

        {{-- apply bot class --}}
        <script>
            const divElement = document.getElementById('hows-bot');
            const classes = ['hows-bot-orange', 'hows-bot-green', 'hows-bot-blue', 'hows-bot-purple'];
            let currentIndex = 0;

            function applyNextClass() {
                divElement.className = classes[currentIndex];
                currentIndex = (currentIndex + 1) % classes.length;
            }

            setInterval(applyNextClass, 5000);
        </script>
    @endsection
