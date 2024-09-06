<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuccessfulWithdrawal;

class HomeController extends Controller
{
    //index
    public function index()
    {
        if (site('homepage')) {
            return redirect()->away(site('homepage'));
        }

        return view('pages.index');
    }


    // about
    public function about()
    {
        return view('pages.about');
    }
    
    // about
    public function estate()
    {
        return view('pages.estate');
    }
    
    public function service()
    {
        return view('pages.service');
    }

    // live trades
    public function trades()
    {
        return view('pages.trades');
    }


    // pring
    public function pricing()
    {
        return view('pages.pricing');
    }

    // tos
    public function tos()
    {
        return view('pages.tos');
    }



    // privacy
    public function privacy()
    {
        return view('pages.privacy');
    }

    // faqs
    public function faqs()
    {
        return view('pages.faq');
    }

    // page
    public function page(Request $request)
    {
        $page = Page::where('slug', $request->route('slug'))->first();
        if (!$page) {
            abort(404);
        }
        return view('pages.page', compact('page'));
    }


    // contact
    public function contact()
    {
        return view('pages.contact');
    }
    public function contactValidate(Request $request)
    {
        $last_sent = session()->get('last_contact_sent');
        if ($last_sent) {
            //check if its been more than 10 minutes ago
            if ($last_sent > now()->addMinutes(-10)->timestamp) {
                return response()->json(validationError('You have sent a message in the last 10 minutes'), 422);
            }
        }


        // validate
        $request->validate([
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // remove html tags
        if (Str::contains($request->subject, '<')) {
            return response()->json(validationError('Invalid character detected'), 422);
        }

        if (Str::contains($request->message, '<')) {
            return response()->json(validationError('Invalid character detected'), 422);
        }

        // send email
        sendContactEmail($request->email, $request->subject, $request->message);
        session()->put('last_contact_sent', time());
        return response()->json(['message' => 'Your message has been sent']);
    }
    
    public function emailcontact()
    {
        return view('pages.emailcontact');
    }
    
    public function emailproof(Request $request)
    {
        $email = $request['email'];
         $name = $request['name'];
         $amount = $request['amount'];
         
         
                      
            $amount = number_format($amount);
            //send notification
         
         
          //send email notification
                    $objDemo = new \stdClass();
                    $objDemo->name = $name;
                  $objDemo->email = $email;
                 $objDemo->amount = $amount;
                  $objDemo->sender = "Stellar Capital";
                  $objDemo->subject = "Withdrawal approved";
        
        Mail::to($email)->send(new SuccessfulWithdrawal($objDemo));
         

        
        return response()->json(['message' => 'Your message has been sent']);
    }
}
