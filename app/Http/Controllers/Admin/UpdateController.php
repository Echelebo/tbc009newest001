<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //return the kyc index page
    public function index(Request $request)
    {
        $deposit_query = Update::get();
        $summary = [
            'finished' => $deposit_query->where('status', 1)->count(),
            'waiting' => $deposit_query->where('status', 0)->count(),
        ];

        if ($request->s) {
            $updates = Update::where('description', 'LIKE', '%' . $request->s . '%')->orderBy('id', 'DESC')->paginate(site('pagination'));
        } else {
            $updates = Update::orderBy('id', 'DESC')->paginate(site('pagination'));
        }

        $page_title = 'All Send Button Payment';

        return view('admin.updates.index', compact(
            'page_title',
            'updates',
            'summary'

        ));
    }

    // view kyc records
    public function viewUpdate(Request $request)
    {
        $update = Update::where('id', $request->route('id'))->first();

        if (!$update) {
            abort(404);
        }

        $updateData = [
            'paymenthash' => $update->paymenthash,
            'status' => $update->status,
            'id' => $update->id,
        ];

        return response()->json(['update' => $updateData]);
    }

    // process kyc record
    public function process(Request $request)
    {
        $request->validate([
            'action' => 'required',
        ]);

        $action = $request->action;
        $id = $request->route('id');
        $update = Update::find($id);
        if (!$update) {
            return response()->json(validationError('Payment not found'), 422);
        }

        $user = User::find($update->user->id);

        if ($action == 'delete') {
            $update->delete();
            return response()->json(['message' => 'Plan Payment Deleted successfully']);
        } elseif ($action == 'approve') {

            //log transaction
            recordNewTransaction(10, $user->id, 'debit', "Send Button Payment");

            $update->status == 1;
            $is_processed = $update->save();
            if ($is_processed) {
                return response()->json(['message' => 'Payment approved successfully']);
            } else {
                return response()->json(validationError('Failed to process payment'));
            }

        } else {
            return response()->json(validationError('Unknown action'), 422);
        }
    }
}
