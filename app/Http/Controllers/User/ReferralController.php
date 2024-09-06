<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ReferralController extends Controller

{
    public function index()
    {
        $page_title = 'My Referrals';
        
        $referralsx = user()->transactions()
            ->where('description', 'Referral Bonus')
            ->sum('amount');
        
        return view('user.referrals.index', compact(
            'page_title',
            'referralsx'
        ));
    }
    
     public function linkindex()
    {
        $page_title = 'My Referrals Link';
        
        return view('user.referralslink.linkindex', compact(
            'page_title',
        ));
    }

}
