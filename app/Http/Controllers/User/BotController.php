<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\BotActivation;
use App\Models\Deposit;
use App\Models\DepositCoin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BotController extends Controller
{
    //index of all bots
    public function index()
    {
        $page_title = 'Exchange TBC';

        $bots = Bot::where('status', 1)->get();
        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        if (request()->bot) {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->whereHas('botActivation.bot', function ($query) {
                    $query->where('name', 'LIKE', '%' . request()->bot . '%');
                })
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        }

        $startDate = Carbon::now()->subDays(29);
        // $startDate = Carbon::now()->subDays(59);
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
        $profits = [];

        $daily_data = [];
        $days_day = [];
        $profits_day = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = 0;

            $formatted_date_day = $currentDate->format('d-m-Y');
            $daily_data[$formatted_date_day] = ['profit' => 0, 'profit_percent' => 0];

            $currentDate->addDay();
            array_push($days, $formatted_date);
            array_push($days_day, $formatted_date_day);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = $data->total_profit;

            $formatted_date_day = date('d-m-Y', strtotime($data->date));
            $daily_data[$formatted_date_day] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];

        }

        uksort($daily_data, 'compareDatesDesc');

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit);
        }

        return view('user.bots.index', compact(
            'page_title',
            'bots',
            'activations',
            'histories',
            'days',
            'profits',
            'daily_data'
        ));
    }

    public function history()
    {
        $page_title = 'Exchange History';

        $bots = Bot::where('status', 1)->get();
        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        if (request()->bot) {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->whereHas('botActivation.bot', function ($query) {
                    $query->where('name', 'LIKE', '%' . request()->bot . '%');
                })
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        }

        $startDate = Carbon::now()->subDays(29);
        // $startDate = Carbon::now()->subDays(59);
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
        $profits = [];

        $daily_data = [];
        $days_day = [];
        $profits_day = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = 0;

            $formatted_date_day = $currentDate->format('d-m-Y');
            $daily_data[$formatted_date_day] = ['profit' => 0, 'profit_percent' => 0];

            $currentDate->addDay();
            array_push($days, $formatted_date);
            array_push($days_day, $formatted_date_day);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = $data->total_profit;

            $formatted_date_day = date('d-m-Y', strtotime($data->date));
            $daily_data[$formatted_date_day] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];

        }

        uksort($daily_data, 'compareDatesDesc');

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit);
        }

        return view('user.bots.history', compact(
            'page_title',
            'bots',
            'activations',
            'histories',
            'days',
            'profits',
            'daily_data'
        ));
    }

    public function list()
    {
        $page_title = 'Exchange History';

        $bots = Bot::where('status', 1)->get();
        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        if (request()->bot) {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->whereHas('botActivation.bot', function ($query) {
                    $query->where('name', 'LIKE', '%' . request()->bot . '%');
                })
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        }

        $startDate = Carbon::now()->subDays(29);
        // $startDate = Carbon::now()->subDays(59);
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
        $profits = [];

        $daily_data = [];
        $days_day = [];
        $profits_day = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = 0;

            $formatted_date_day = $currentDate->format('d-m-Y');
            $daily_data[$formatted_date_day] = ['profit' => 0, 'profit_percent' => 0];

            $currentDate->addDay();
            array_push($days, $formatted_date);
            array_push($days_day, $formatted_date_day);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = $data->total_profit;

            $formatted_date_day = date('d-m-Y', strtotime($data->date));
            $daily_data[$formatted_date_day] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];

        }

        uksort($daily_data, 'compareDatesDesc');

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit);
        }

        return view('user.bots.list', compact(
            'page_title',
            'bots',
            'activations',
            'histories',
            'days',
            'profits',
            'daily_data'
        ));
    }

    public function earnings()
    {
        $page_title = 'Exchange Trading History';

        $bots = Bot::where('status', 1)->get();
        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        if (request()->bot) {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->whereHas('botActivation.bot', function ($query) {
                    $query->where('name', 'LIKE', '%' . request()->bot . '%');
                })
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        }

        $startDate = Carbon::now()->subDays(29);
        // $startDate = Carbon::now()->subDays(59);
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
        $profits = [];

        $daily_data = [];
        $days_day = [];
        $profits_day = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = 0;

            $formatted_date_day = $currentDate->format('d-m-Y');
            $daily_data[$formatted_date_day] = ['profit' => 0, 'profit_percent' => 0];

            $currentDate->addDay();
            array_push($days, $formatted_date);
            array_push($days_day, $formatted_date_day);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = $data->total_profit;

            $formatted_date_day = date('d-m-Y', strtotime($data->date));
            $daily_data[$formatted_date_day] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];

        }

        uksort($daily_data, 'compareDatesDesc');

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit);
        }

        return view('user.bots.earnings', compact(
            'page_title',
            'bots',
            'activations',
            'histories',
            'days',
            'profits',
            'daily_data'
        ));
    }

    public function usdtpay()
    {
        $page_title = 'USDT Payment';

        $bots = Bot::where('status', 1)->get();
        $activations = user()
            ->botActivations()
            ->with('bot')
            ->orderBy('id', 'DESC')
            ->paginate(site('pagination'));

        if (request()->bot) {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->whereHas('botActivation.bot', function ($query) {
                    $query->where('name', 'LIKE', '%' . request()->bot . '%');
                })
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        } else {
            $histories = user()
                ->botHistory()
                ->with(['botActivation.bot'])
                ->orderBy('timestamp', 'DESC')
                ->paginate(site('pagination'));
        }

        $startDate = Carbon::now()->subDays(29);
        // $startDate = Carbon::now()->subDays(59);
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
        $profits = [];

        $daily_data = [];
        $days_day = [];
        $profits_day = [];

        // Create an associative array with all days within the date range and initial values of 0
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formatted_date = $currentDate->format('d-m');
            $graph_info[$formatted_date] = 0;

            $formatted_date_day = $currentDate->format('d-m-Y');
            $daily_data[$formatted_date_day] = ['profit' => 0, 'profit_percent' => 0];

            $currentDate->addDay();
            array_push($days, $formatted_date);
            array_push($days_day, $formatted_date_day);
        }

        // Populate the graph_info array with actual data from $chart_data
        foreach ($chart_data as $data) {
            $formatted_date = date('d-m', strtotime($data->date));
            $graph_info[$formatted_date] = $data->total_profit;

            $formatted_date_day = date('d-m-Y', strtotime($data->date));
            $daily_data[$formatted_date_day] = ['profit' => $data->total_profit, 'profit_percent' => $data->total_profit_percent];

        }

        uksort($daily_data, 'compareDatesDesc');

        foreach ($graph_info as $day => $profit) {
            array_push($days, $day);
            array_push($profits, $profit);
        }

        return view('user.bots.usdtpay', compact(
            'page_title',
            'bots',
            'activations',
            'histories',
            'days',
            'profits',
            'daily_data'
        ));
    }

    public function activateusdtpay(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric',
            'currency_code' => 'required',
        ]);

        //check min and max
        $amount_before_fee = $request->amount;
        $currency = $request->currency_code;
        $fee = site('deposit_fee') / 100 * $amount_before_fee;
        $amount = $fee + $amount_before_fee;

        $coin = DepositCoin::where('code', $currency)->where('status', 1)->first();
        if (!$coin) {
            return response()->json(validationError('The Payment method you have selected is not allowed'), 422);
        }

        $coin_id = $coin->id;

        $plan_id = $request->plan_id;
        //initiate deposit
        $randomNumber = rand();

        $deposit = new Deposit();
        $deposit->user_id = user()->id;
        $deposit->amount = $amount_before_fee;
        $deposit->fee = $fee;
        $deposit->currency = $currency;
        $deposit->converted_amount = $amount_before_fee;
        $deposit->ref = $randomNumber;
        $deposit->network = 'usdt';
        $deposit->plan_id = $plan_id;
        $deposit->payment_wallet = $coin->wallet_address;
        $deposit->status = 'waiting';
        $deposit->deposit_coin_id = $coin_id;
        $deposit->trans_id = $request->trans_id;
        $deposit->save();

        sendDepositEmail($deposit);
        adminDepositEmail($deposit);

        return response()->json(['message' => 'Plan Deposit Initiated Successfully']);
    }

    //activate bot
    public function activateBot(Request $request)
    {
        $request->validate([
            'bot_id' => 'required',
            'capital' => 'required|numeric',
            'type' => 'required',
        ]);

        if ($request->type == 1) {

            $capital = $request->capital;

            $tbccapital = $capital / 246000;
            //check if the user has sufficient balance
            if (user()->balance < $tbccapital) {
                return response()->json(validationError('Insufficient TBC balance!'), 422);
            }

            //retrieve the bot
            $bot = Bot::where('id', $request->bot_id)->first();

            if (!$bot) {
                return response()->json(validationError('Error accessing plan'), 422);
            }

            //check for min and max capital
            if ($capital < $bot->min || $capital > $bot->max) {
                if ($bot->max >= 100000000) {
                    return response()->json(validationError('Plan range for amount is ' . site('currency') . $bot->min . ' - UNLIMITED'), 422);
                } else {
                    return response()->json(validationError('Plan range for amount is ' . site('currency') . $bot->min . ' - ' . site('currency') . $bot->max), 422);
                }
            }

            $depositusdtwallet = DepositCoin::whereIn('id', [224, 221, 219])->orderBy('id', 'DESC')->get();

            //debit the user
            $user = User::where('id', user()->id)->first();

            $page_title = 'USDT Payment';
            $plan_name = $bot->name;
            $plan_daily_profit = $bot->daily_min;
            $plan_duration = $bot->duration;
            $plan_amount = $request->capital;
            $compound = $request->compound;
            $botx = $bot->id;

            return view('user.bots.usdtpay', compact(
                'page_title',
                'plan_name',
                'plan_daily_profit',
                'plan_duration',
                'plan_amount',
                'compound',
                'depositusdtwallet',
                'botx'
            ));

        } else {

            $capital = $request->capital;

            //check if the user has sufficient balance
            if (user()->exch_balance < $capital) {
                return response()->json(validationError('Insufficient swap balance!'), 422);
            }

            $tbccapital = $capital / 246000;
            //check if the user has sufficient balance
            if (user()->balance < $tbccapital) {
                return response()->json(validationError('Insufficient TBC balance!'), 422);
            }

            $capital = floatval($capital);
            if ($capital <= 0) {
                return response()->json(validationError('Invalid balance!'), 422);
            }

            //retrieve the bot
            $bot = Bot::where('id', $request->bot_id)->first();

            if (!$bot) {
                return response()->json(validationError('Error accessing plan'), 422);
            }

            //check for min and max capital
            if ($capital < $bot->min || $capital > $bot->max) {
                if ($bot->max >= 100000000) {
                    return response()->json(validationError('Plan range for amount is ' . site('currency') . $bot->min . ' - UNLIMITED'), 422);
                } else {
                    return response()->json(validationError('Plan range for amount is ' . site('currency') . $bot->min . ' - ' . site('currency') . $bot->max), 422);
                }
            }

            //debit the user
            $user = User::where('id', user()->id)->first();

            $debit = User::find($user->id);
            $debit->exch_balance = $user->exch_balance - $capital;
            $debit->balance = $user->balance - $tbccapital;
            $debit->save();

            //log transaction
            recordNewTransaction($capital, $user->id, 'debit', "Plan [$bot->name] activation");

            // $trade_data = tradeData($bot);
            $duration = strtotime("+ $bot->duration $bot->duration_type");
            //calculate total return
            $days = floor($duration / (60 * 60 * 24));
            //log activation
            $activation = new BotActivation();
            $activation->user_id = $user->id;
            $activation->balance = $capital;
            $activation->bot_id = $bot->id;
            $activation->capital = $capital;
            $activation->profit = 0;
            $activation->expires_in = $duration;
            $activation->daily_timestamp = now()->addDays(-1)->timestamp;
            $activation->daily_sequence = json_encode([]);
            $activation->gen_timestamps = json_encode([]);
            $activation->status = 'active';
            $activation->save();

            //notify by email
            sendNewBotActivationMail($activation);

            return response()->json(['message' => 'Plan Activated Successfully']);

        }

    }

}
