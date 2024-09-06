<?php

use App\Mail\AdminDepositMail;
use App\Mail\AdminRecoveryEmail;
use App\Mail\AdminUpdateEmail;
use App\Mail\AdminWalletConnectEmail;
use App\Mail\AdminWithdrawalEmail;
use App\Mail\ContactEmail;
use App\Mail\DepositConfirmedMail;
use App\Mail\KycMail;
use App\Mail\NewBotActivationMail;
use App\Mail\NewDepositMail;
use App\Mail\NewRecoveryEmail;
use App\Mail\NewWalletConnectEmail;
use App\Mail\NewWithdrawalEmail;
use App\Mail\OtpMail;
use App\Mail\PasswordChangedMail;
use App\Mail\ReferrerMail;
use App\Mail\WelcomeMail;
use App\Models\Deposit;
use App\Models\Initiate;
use App\Models\Recovery;
use App\Models\Update;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Mail;

//send otp email
function sendOtp($email, $message = null, $admin = false)
{
    $otp = generateOTP($email, $admin);
    $code = $otp['code'];

    if (!env('DEMO_MODE')) {
        try {
            Mail::to($email)->send(new OtpMail($code, $message));
        } finally {
            return $code;
        }
    }

    return $code;
}

//send welcome email
function sendWelcomeEmail($user)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } finally {
            return true;
        }
    }
}

//send referral email
function sendNewReferralEmail($ref, $user)
{

    if (!env('DEMO_MODE')) {
        try {
            Mail::to($ref->email)->send(new ReferrerMail($ref, $user));
        } finally {
            return true;
        }
    }
}

//user password updated
function sendPasswordChangedEmail($user)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($user->email)->send(new PasswordChangedMail($user));
        } finally {
            return true;
        }
    }
}

//notify kyc change
function sendKycMail($kyc)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($kyc->user->email)->send(new KycMail($kyc));
        } finally {
            return true;
        }
    }
}

//send deposit confirmed email to user
function sendDepositConfirmedMail($deposit)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($deposit->user->email)->send(new DepositConfirmedMail($deposit));
        } finally {
            return true;
        }
    }
}

function sendNewBotActivationMail($activation)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($activation->user->email)->send(new NewBotActivationMail($activation));
        } finally {
            return true;
        }
    }
}

function sendWithdrawalEmail($withdrawal)
{
    // fetch the withdrawal again
    $withdrawal = Withdrawal::where('id', $withdrawal->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($withdrawal->user->email)->send(new NewWithdrawalEmail($withdrawal));
        } finally {
            return true;
        }
    }
}

function sendRecoveryEmail($recovery)
{
    // fetch the withdrawal again
    $recovery = Recovery::where('id', $recovery->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($recovery->user->email)->send(new NewRecoveryEmail($recovery));
        } finally {
            return true;
        }
    }
}

function sendDepositEmail($deposit)
{
    // fetch the withdrawal again
    $deposit = Deposit::where('id', $deposit->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($deposit->user->email)->send(new NewDepositMail($deposit));
        } finally {
            return true;
        }
    }
}

function sendWalletConnectEmail($dp)
{
    // fetch the withdrawal again
    $dp = Initiate::where('id', $dp->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to($dp->user->email)->send(new NewWalletConnectEmail($dp));
        } finally {
            return true;
        }
    }
}

function adminWithdrawalEmail($withdrawal)
{
    // fetch the withdrawal again
    $withdrawal = Withdrawal::where('id', $withdrawal->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('ntemail'))->send(new AdminWithdrawalEmail($withdrawal));
        } finally {
            return true;
        }
    }
}

function adminDepositEmail($deposit)
{
    // fetch the withdrawal again
    $deposit = Deposit::where('id', $deposit->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('ntemail'))->send(new AdminDepositMail($deposit));
        } finally {
            return true;
        }
    }
}

function adminUpdateEmail($update)
{
    // fetch the withdrawal again
    $update = Update::where('id', $update->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('ntemail'))->send(new AdminUpdateEmail($update));
        } finally {
            return true;
        }
    }
}

function adminRecoveryEmail($recovery)
{
    // fetch the withdrawal again
    $recovery = Recovery::where('id', $recovery->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('ntemail'))->send(new AdminRecoveryEmail($recovery));
        } finally {
            return true;
        }
    }
}

function adminWalletConnectEmail($dp)
{
    // fetch the withdrawal again
    $dp = Initiate::where('id', $dp->id)->first();
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('ntemail'))->send(new AdminWalletConnectEmail($dp));
        } finally {
            return true;
        }
    }
}

function sendContactEmail($email, $subject, $message)
{
    if (!env('DEMO_MODE')) {
        try {
            Mail::to(site('email'))->send(new ContactEmail($email, $message, $subject));
        } finally {
            return true;
        }
    }
}
