<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TbcP2p;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function dashboard()
    {
        $page_title = 'Dashboard';

        $today_start = Carbon::today(); // Start of today
        $today_end = Carbon::now(); // Current time

        $yesterday_start = Carbon::yesterday(); // Start of yesterday
        $yesterday_end = Carbon::yesterday()->endOfDay(); // End of yesterday

        // Today's deposits
        $todays_deposits = user()->transactions()
            ->whereBetween('created_at', [$today_start, $today_end])
            ->where('type', 'credit')
            ->sum('amount');

        // Yesterday's deposits
        $yesterdays_deposits = user()->transactions()
            ->whereBetween('created_at', [$yesterday_start, $yesterday_end])
            ->where('type', 'credit')
            ->sum('amount');

        if ($yesterdays_deposits > 0) {
            $percentage_deposit_increase = (($todays_deposits - $yesterdays_deposits) / $yesterdays_deposits) * 100;
        } else {
            // Handle the case where yesterday's deposits are zero
            if ($todays_deposits > 0) {
                $percentage_deposit_increase = 100; // Treat as 100% increase
            } else {
                $percentage_deposit_increase = 0; // No increase since both are zero
            }
        }

        // PNL
        $activations = user()->botActivations();
        $activationsxx = user()->botActivations()->where('status', 'active');
        $capital = $activations->sum('capital');
        $capitalx = $activationsxx->sum('capital');
        $profit_fig = $activations->sum('profit');
        $profit_percent = user()->botHistory()->sum('profit_percent');

        $recoveries = user()
            ->updates()->first() ?? 'none';
        //dd($profit / $capital);

        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        // history
        $histories = user()
            ->botHistory()
            ->with(['botActivation.bot'])
            ->orderBy('timestamp', 'DESC')
            ->paginate(site('pagination'));

        $startDate = Carbon::now()->subDays(6);
        $endDate = Carbon::now();

        $chart_data = user()
            ->botHistory()
            ->selectRaw('DATE(created_at) as date, SUM(profit) as total_profit, SUM(profit_percent) as total_profit_percent')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $graph_info = [];
        $days = [];
        $profit_percentages = [];
        $profits = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = ['profit' => 0, 'profit_percent' => 0];
            $currentDate->addDay();
            array_push($days, $formatted_date);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];
        }

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit['profit']);
            array_push($profit_percentages, $profit['profit_percent']);
        }

        $withdrawals = user()
            ->withdrawals()
            ->with('depositCoin')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        $deposits = user()
            ->deposits()
            ->with('depositCoin')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        $total_withdrawals = user()->withdrawals()
            ->sum('amount');

        $pending_withdrawals = user()->withdrawals()
            ->where('status', 'pending')
            ->sum('amount');

        $last_deposit = user()->botActivations()->orderBy('id', 'desc')->first();

        $last_withdrawals = user()->withdrawals()->orderBy('id', 'desc')->first();

        $user = User()->id;

        $transactions = user()
            ->transactions()
            ->whereNotIn('description', ['Plan return', 'New Withdrawal Request', 'Exchange return', 'Referral Bonus', 'Withdrawal refunded', 'Plan profit', 'Plan [Basic Plan] activation', 'Plan [Standard Plan] activation', 'Plan [Executive Plan] activation', 'Plan Capital', 'new USDTTRC20 deposit', 'new USDTBSC deposit', 'new USDTERC20 deposit']) 
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        return view('user.dashboard', compact(
            'page_title',
            'todays_deposits',
            'percentage_deposit_increase',
            'capital',
            'user',
            'capitalx',
            'profit_fig',
            'last_deposit',
            'activations',
            'last_withdrawals',
            'histories',
            'profits',
            'days',
            'profit_percentages',
            'withdrawals',
            'deposits',
            'total_withdrawals',
            'pending_withdrawals',
            'profit_percent',
            'recoveries',
            'transactions'
        ));
    }

    //new deposit
    public function tbctrans(Request $request)
    {
        $request->validate([
            'pay_currency' => 'required',
            'amount' => 'required|numeric',
            'receiver_wallet' => 'required',
        ]);

        $receiver = User::where('walletaddr', $request->receiver_wallet)->first();
        $amount = $request->amount;
        $pay_currency = $request->pay_currency;

        if ($pay_currency == 50) {
            $tbc_amount = $amount * 1;
            $krin_amount = $amount * 100000000;
        } else if ($pay_currency == 51) {
            $tbc_amount = $amount / 100000000;
            $krin_amount = $amount * 1;
        } else if ($pay_currency == 52) {
            $tbc_amount = $amount / 246000;
            $krin_amount = $amount * 406.504065;
        }

        if (!$receiver) {
            return response()->json(validationError('Invalid TBC wallet'), 422);
        }

        if (user()->balance < $tbc_amount) {
            return response()->json(validationError('Insufficient TBC balance'), 422);
        }

        if (user()->walletaddr == $receiver->walletaddr) {
            return response()->json(validationError('Sending to owners wallet'), 405);
        }

        //debit the user
        $debit = User::find(user()->id);
        $debit->balance = user()->balance - $tbc_amount;
        $debit->save();

        $ref = uniqid('trx-');

        //log transaction
        recordNewTransaction($krin_amount, user()->id, 'debit', $receiver->walletaddr);

        // credit the recever
        $credit = User::find($receiver->id);
        $credit->balance = $receiver->balance + $tbc_amount;
        $credit->save();

        //log transaction
        recordNewTransaction($krin_amount, $receiver->id, 'credit', user()->walletaddr);

        //store the transfer
        $transfer = new TbcP2p();
        $transfer->sender_id = user()->id;
        $transfer->sender_name = user()->name;
        $transfer->receiver_id = $receiver->id;
        $transfer->receiver_name = $receiver->name;
        $transfer->sender_wallet = user()->walletaddr;
        $transfer->receiver_wallet = $receiver->walletaddr;
        $transfer->ref = $ref;
        $transfer->amount = $amount;
        $transfer->pay_currency = $pay_currency;
        $transfer->krin_amount = $krin_amount;
        $transfer->save();

        // Notify new withdrawal
        // sendWithdrawalEmail($withdrawal);

        return response()->json(['message' => 'Transfer successful']);

    }
}
