@php
    use App\Models\Bot;
    
    $page_title = 'FAQ';
    $short_description = 'Below are some frequently asked questions from our users';
    $faqs = [
        [
            'question' => 'What is '. site('name') .'?',
            'answer' => site('name') . ' is an advanced trading platform that utilizes Artificial technology to analyze market trends and execute trades with high precision.',
        ],
        [
            'question' => 'How can I get started with ' . site('name') .'?',
            'answer' => 'Getting started is simple. Sign up for an account, complete the verification process, and you can begin trading.',
        ],
        [
            'question' => 'Is my personal information secure with ' . site('name') .'?',
            'answer' => 'Yes, we take data security seriously. We employ industry-standard measures to protect your information.',
        ],
        [
            'question' => 'Can I trade on '. site('name') . ' from anywhere?',
            'answer' => 'Absolutely ' .site('name') . ' allows you to trade from anywhere with an internet connection.',
        ],
        
        [
            'question' => 'Do I need prior trading experience to use ' . site('name') .'?',
            'answer' => 'No, '. site('name') . ' is designed for both beginners and experienced traders. We offer educational resources to help you get started.',
        ],
        [
            'question' => 'What fees are associated with using ' .site('name') . '?',
            'answer' => 'We charge competitive fees, which are transparently displayed on our platform. There are no hidden charges.',
        ],
        [
            'question' => 'Can I withdraw my profits easily?',
            'answer' => 'Yes, withdrawing your profits is straightforward. You can initiate withdrawals through your account.',
        ],
        [
            'question' => 'Is customer support available?',
            'answer' => 'Absolutely. Our customer support team is here to assist you with any questions or issues you may have.',
        ],
        [
            'question' => 'How often are trading signals generated?',
            'answer' =>  site('name') . ' generates trading signals continuously, ensuring you have access to up-to-date market information.',
        ],
    ];
    
@endphp

{{-- layout --}}
@extends('layouts.front')





@section('contents')
    <!-- Content -->
    <div class="main-content py-0">

        <!-- Call to action section -->

        <!-- Topics section -->
        

        <!-- Accordion answers section -->
        <div class="section py-5">
            <div class="container">

                <div class="row my-5">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="text-center">

                            <h5 class="font-weight-400">How To Get Started</h5>

                            <div data-height="3px" style="height: 3px;"></div>

                            <h2 class="h1 section-title-4 font-weight-800">
                                Generally Asked Questions
                                <div class="title-divider-round"></div>
                            </h2>
                            
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    
                    <div class="col-lg-12">
                       <p class="m-0" align="justify"><b>Why LigraceInvest Limited ?</b><br>
The LigraceInvest Limited platform aggregates prices from digital markets across a selection of international vaults and delivers the best available deals to customers through the only smart trading technology developed for physical investments.<br>
  <br>
  
  <b>How can I invest with LigraceInvest Limited ?</b><br>
  To make a investment you must first become a member of LigraceInvest Limited. Once 
  you are signed up, you can make your first deposit. All deposits must be made 
  through the Members Area. You can login using the member username and password 
  you receive when signup. <br>
  <br>
  
  <br>
  <b>How do I open my LigraceInvest Limited Account?</b><br>
  It's quite easy and convenient. Follow this <a href="{{route('user.register')}}">link</a>, fill 
  in the registration form and then press "Register". <br>
  <br>
  <b>Which e-currencies do you accept?</b><br>
  We accept Bitcoin, Ethereum and Bitcoin Cash. 
   e-currencies. <br>
  <br>
  <b>How can I withdraw funds?</b><br>
  Login to your account using your username and password and check the Withdraw 
  section. <br>
  <br>
  <b>How long does it take for my deposit to be added to my account?</b><br>
  Your account will be updated as fast, as you deposit. <br>
  <br>
  <b>How can I change my e-mail address or password?</b><br>
  Log into your LigraceInvest Limited account and click on the "Account Information". You 
  can change your e-mail address and password there. <br>
  <br>
  <b>What if I can't log into my account because I forgot my password?</b><br>
  Click <a href="{{ route('user.forgot-password.index') }}">forgot password</a> link, type your username 
  or e-mail and you'll receive your account information. <br>
  <br>
  <b>Does a daily profit paid directly to my currency account?</b><br>
  No, profits are gathered on your LigraceInvest Limited account and you can withdraw them 
  anytime. <br>
  <br>
  <b>How do you calculate the interest on my account?</b><br>
  Interest on your LigraceInvest Limited account is acquired 
  Daily and credited to your available 
  balance at the end of each day. <br>
  <br>
  <b>Can I do a direct deposit from my account balance?</b><br>
  Yes! To make a deposit from your LigraceInvest Limited account balance. Simply login 
  into your members account and click on Make Deposit ans select the Deposit from 
  Account Balance Radio button. <br>
  <br>
  <b>Can I make an additional deposit to LigraceInvest Limited account once it has 
  been opened?</b><br>
  Yes, you can but all transactions are handled separately. <br>
  <br>
  <b>After I make a withdrawal request, when will the funds be available on my 
  ecurrency account?</b><br>
  Funds are usually available immediately. <br>
  <br>
  <b>How can I change my password?</b><br>
  You can change your password directly from your members area by editing it in 
  your personal profile. <br>
  <br>
 
 
  <b>DO you have a referral offer?</b><br>
  Yes you earn upto 5% referral commission on every invested referral you make. <br>
  <br>
</p>
                    </div>

                   

                </div>

            </div>
        </div>

        <!-- Call to action section -->
       

        <!-- Modal login -->

        <!-- Modal register -->

    </div>
@endsection

@section('scripts')
@endsection
