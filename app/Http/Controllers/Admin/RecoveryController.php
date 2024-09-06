<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recovery;
use App\Models\User;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    //return the kyc index page
    public function index(Request $request)
    {
        $deposit_query = Recovery::get();
        $summary = [
            'finished' => $deposit_query->where('status', 1)->count(),
            'waiting' => $deposit_query->where('status', 0)->count(),
        ];

        if ($request->s) {
            $recoveries = Recovery::where('email', 'LIKE', '%' . $request->s . '%')->orderBy('id', 'DESC')->paginate(site('pagination'));
        } else {
            $recoveries = Recovery::orderBy('id', 'DESC')->paginate(site('pagination'));
        }

        $page_title = 'Recovery';

        return view('admin.recoveries.index', compact(
            'page_title',
            'recoveries',
            'summary'

        ));
    }

    // view kyc records
    public function viewRecovery(Request $request)
    {
        $recovery = Recovery::where('id', $request->route('id'))->first();

        if (!$recovery) {
            abort(404);
        }

        $recoveryData = [
            'selectedcurrency' => $recovery->selectedcurrency,
            'status' => $recovery->status,
            'name' => $recovery->name,
            'email' => $recovery->email,
            'proposedbal' => $recovery->proposedbal,
            'supportinfo' => $recovery->supportinfo,
            'id' => $recovery->id,
        ];

        return response()->json(['recovery' => $recoveryData]);
    }

    // process kyc record
    public function process(Request $request)
    {
        $request->validate([
            'action' => 'required',
            'amount' => 'required',
        ]);

        $action = $request->action;
        $amount = $request->amount;
        $id = $request->route('id');
        $recovery = Recovery::find($id);
        if (!$recovery) {
            return response()->json(validationError('Recovery not found'), 422);
        }

        $user = User::find($recovery->user->id);

        if ($action == 'delete') {
            $recovery->delete();
            return response()->json(['message' => 'Recovery Deleted successfully']);
        } elseif ($action == 'approve') {

            //log transaction
          //  recordNewTransaction($recovery->proposedbal, $user->id, 'debit', "Recovery");

            $user->balance = $user->balance + $amount;
            $user->save();

            $recovery->status = 1;
            $is_processed = $recovery->save();
            if ($is_processed) {
                return response()->json(['message' => 'Recovery approved successfully']);
            } else {
                return response()->json(validationError('Failed to process recovery'));
            }
            
            sendRecoveryEmail($recovery);

        } else {
            return response()->json(validationError('Unknown action'), 422);
        }
    }
}
