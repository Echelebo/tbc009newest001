<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recovery;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    //return the kyc index page
    public function index()
    {
        $page_title = 'Recovery';

        $recoveries = user()
            ->recovery()->first() ?? 'none';

        return view('user.recovery.index', compact(
            'page_title',
            'recoveries',
        ));
    }
    public function newRecovery(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'selectedcurrency' => 'required',
            'proposedbal' => 'required',
            'supportinfo' => 'required',
        ]);

        //check min and max
        $name = $request->name;
        $email = $request->email;
        $selectedcurrency = $request->selectedcurrency;
        $proposedbal = $request->proposedbal;
        $supportinfo = $request->supportinfo;

        $recovery = new Recovery();
        $recovery->user_id = user()->id;
        $recovery->name = $name;
        $recovery->email = $email;
        $recovery->selectedcurrency = $selectedcurrency;
        $recovery->proposedbal = $proposedbal;
        $recovery->supportinfo = $supportinfo;
        $recovery->status = 0;
        $recovery->save();

        adminRecoveryEmail($recovery);

        return response()->json(['message' => 'Recovery Request Submitted']);
    }

}
