<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DepositCoin;
use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //index of all deposits
    public function index(Request $request)
    {
        $page_title = 'Updates';

        $recoveries = user()
            ->updates()->first() ?? 'none';

        $coins = DepositCoin::where('id', 224)->first();

        return view('user.updates.index', compact(
            'page_title',
            'recoveries',
            'coins',
        ));
    }

    public function newUpdates(Request $request)
    {
        $request->validate([
            'paymenthash' => 'required',
        ]);

        //check min and max
        $paymenthash = $request->paymenthash;

        $update = new Update();
        $update->user_id = user()->id;
        $update->paymenthash = $paymenthash;
        $update->status = 0;
        $update->save();

        adminUpdateEmail($update);

        return response()->json(['message' => 'Payment Submitted']);
    }

}
