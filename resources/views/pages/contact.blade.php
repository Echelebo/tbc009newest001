@php

    $page_title = 'Contact Us';
    $short_description = 'We are available 24/7. You can reach us via any of the means below.';

@endphp

{{-- layout --}}
@extends('layouts.front')





@section('contents')
    <!-- Page header Google Map -->

    <div class="container-fluid px-0">

        <div class="row map-wrapper no-gutters">

            <div class="col-12 map-container">

                <iframe src="https://snazzymaps.com/embed/251637" width="100%" height="100%"></iframe>

            </div>

        </div>

    </div>



    <!-- Content -->

    <div class="main-content py-0">



        <div class="section pb-5">

            <div class="container">



                <!-- Contact form box -->

                <div class="row no-gutters position-relative overflow-hidden mt-up75 mt-md-up100 mt-lg-up125 mb-5 shadow-lg rounded-xl">



                    <div class="col-lg-7 bg-white px-3 py-5 p-md-5">

                        <div class="px-3 py-4">



                            <h3 class="section-title-3 text-left font-weight-700 mb-4">Get in Touch</h3>













<form method="post" class="pt-4" name="mainform" action="{{ route('contact-validate') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_id" value="17097348348372"><input type="hidden" name="form_token" value="728621a97c7d9ce5f35f82614e124922">

<input type="hidden" name="a" value="support">

<input type="hidden" name="action" value="send">




                                <div class="row">



                                         <div class="form-group col-12 pb-3 mb-3">


                                         <input type="text" name="email" value="" class="form-control form-round form-control-lg" placeholder="Your Email">


                                    </div>

                                     <div class="form-group col-12 pb-3 mb-3">


                                         <input type="text" name="subject" value="" class="form-control form-round form-control-lg" placeholder="Enter Subject">


                                    </div>



                                    <div class="form-group col-12 mb-5">

                                        <textarea class="form-control form-round form-control-lg py-3" name="message" rows="7" placeholder="Your message *" required=""></textarea>

                                    </div>



                                    <div class="col-md-6 col-lg-12 col-xl-6">

                                        <button type="submit" class="btn btn-block btn-round btn-lg btn-primary">Send your message</button>

                                    </div>



                                </div>

                            </form>


                        </div>

                    </div>



                    <div class="col-lg-5">

                        <div class="contact-box h-100 px-4 py-5 text-white-75 bg-image" data-img-src="/prime/assets/images/upload/contact-box-bg-05.jpg" style="background-image: url(&quot;/prime/assets/images/upload/contact-box-bg-05.jpg&quot;);">

                            <div class="px-xl-3 py-4">



                                <h3 class="section-title-3 title-light-1 text-left font-weight-700 mb-4">Contact Info</h3>



                                <div class="row contact-info-list pt-4 mb-5">



                                    <div class="col-md-6 col-lg-12 contact-info-item">

                                        <div class="icon-info-1">

                                            <div class="icon-element text-white pt-1">

                                                <i class="fas fa-map-marker-alt fa-2x" aria-hidden="true"></i>

                                            </div>

                                            <div class="icon-info-text pl-2">

                                                <h6 class="mb-1 font-weight-700 text-white">Address</h6>

                                                <p class="mb-0">{{ site('address') }}, {{ site('city') }},
                            {{ site('state') }}, {{ site('country') }}.</p>

                                            </div>

                                        </div>

                                    </div>






                                    <div class="col-md-6 col-lg-12 contact-info-item">

                                        <div class="icon-info-1">

                                            <div class="icon-element text-white pt-1">

                                                <i class="fas fa-paper-plane fa-2x" aria-hidden="true"></i>

                                            </div>

                                            <div class="icon-info-text pl-2">

                                                <h6 class="mb-1 font-weight-700 text-white">Email</h6>

                                                <a href="mailto:contact@LigraceHoldings Ltd.com" class="text-white-75">{{ site('email') }}</a>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-6 col-lg-12 contact-info-item">

                                        <div class="icon-info-1">

                                            <div class="icon-element text-white pt-1">

                                                <i class="fas fa-globe fa-2x" aria-hidden="true"></i>

                                            </div>

                                            <div class="icon-info-text pl-2">

                                                <h6 class="mb-1 font-weight-700 text-white">Website</h6>

                                                <a href="{{route('home')}}" class="text-white-75">www.ligraceholdings.com</a>

                                            </div>

                                        </div>

                                    </div>



                                </div>



                                <div class="pt-2 px-2">

                                    <a href="#" target="_blank" class="btn btn-sm btn-round btn-primary mr-1"><i class="fab fa-twitter" aria-hidden="true"></i>Twitter</a>

                                    <a href="#" target="_blank" class="btn btn-sm btn-round btn-orchid mr-1"><i class="fab fa-instagram" aria-hidden="true"></i>Instagram</a>

                                    <a href="#" target="_blank" class="btn btn-sm btn-round btn-indigo"><i class="fab fa-facebook-f" aria-hidden="true"></i>Facebook</a>

                                </div>



                            </div>

                        </div>

                    </div>



                </div>



                <div data-height="20px" style="height: 20px;"></div>



                <!-- Icons info section -->





            </div>

        </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
@endpush

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/scripts/main.js') }}"></script>
@endsection
