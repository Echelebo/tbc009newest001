<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    //index of all withdrawals
    public function index(Request $request)
    {
        $page_title = 'Explorer';

        if ($request->s) {
            $transactions = Transaction::whereNotIn('description', ['Plan return', 'Plan [Basic Plan] activation', 'Exchange return', 'Referral Bonus', 'New Withdrawal Request', 'Withdrawal refunded', 'Plan profit', 'Plan [Standard Plan] activation', 'Plan [Executive Plan] activation', 'Plan Capital', 'new USDTTRC20 deposit', 'new USDTBSC deposit', 'new USDTERC20 deposit'])
            ->where('description', 'LIKE', '%' . $request->s . '%')
            ->orderBy('id', 'DESC')
            ->paginate(50);
        } else {
            $transactions = Transaction::whereNotIn('description', ['Plan return', 'Plan [Basic Plan] activation', 'Exchange return', 'Referral Bonus', 'New Withdrawal Request', 'Withdrawal refunded', 'Plan profit', 'Plan [Standard Plan] activation', 'Plan [Executive Plan] activation', 'Plan Capital', 'new USDTTRC20 deposit', 'new USDTBSC deposit', 'new USDTERC20 deposit'])
            ->orderBy('id', 'DESC')
            ->paginate(50);
        }

        return view('user.explorer.index', compact(
            'page_title',
            'transactions',
        ));
    }

}
