<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;


class AccountController extends Controller
{
    //return profile
    public function profile()
    {

        $page_title = 'My Profile';
        return view('user.profile.index', compact(
            'page_title'
        ));
    }


    //show page for editing profile
    public function editProfile()
    {
        $page_title = 'Edit Profile';

        $g2fa_secret = user()->g2fa_secret;
        $google2fa = new Google2FA();
        // generate g2fa_secret if the user has not set it up before
        if (!user()->g2fa_secret){
            $g2fa_secret = $google2fa->generateSecretKey();
            $user = User::find(user()->id);
            $user->g2fa_secret = $g2fa_secret;
            $user->save();
        }

        $qr_code_url = $google2fa->getQRCodeUrl(
            site('name'),
            user()->email,
            $g2fa_secret
        );

        return view('user.profile.edit', compact(
            'page_title',
            'qr_code_url'
        ));
    }


//show page for editing profile
    public function editSecurity()
    {
        $page_title = 'Security';

        $g2fa_secret = user()->g2fa_secret;
        $google2fa = new Google2FA();
        // generate g2fa_secret if the user has not set it up before
        if (!user()->g2fa_secret){
            $g2fa_secret = $google2fa->generateSecretKey();
            $user = User::find(user()->id);
            $user->g2fa_secret = $g2fa_secret;
            $user->save();
        }

        $qr_code_url = $google2fa->getQRCodeUrl(
            site('name'),
            user()->email,
            $g2fa_secret
        );

        return view('user.security.edit', compact(
            'page_title',
            'qr_code_url'
        ));
    }

    //validate profile edit
    public function editProfileValidate(Request $request)
    {
        

        $validationRules = [
            'name' => 'two_words',
        ];

        if (!user()->username) {
            $validationRules['username'] = 'required|unique:users|min:3|max:10';
        }

        $request->validate($validationRules);

        //update the user
        $user = User::find(user()->id);
        $user->name = $request->name;
        $user->username = user()->username ?? $request->username;
        $user->usdt_wallet = $request->usdt_wallet;
        $user->usdterc_wallet = $request->usdterc_wallet;
        $user->usdtbsc_wallet = $request->usdtbsc_wallet;
        $user->save();

        return response()->json(['message' => 'Account updated successfully']);

        
    }

    //update password
    public function updatePassword(Request $request)
    {
        $require_strong_password = site('strong_password');
        $request->validate([
            'current_password' => 'required', 
            'password' => [
                'required',
                'confirmed',
                ($require_strong_password == 1 ? 'min:8' : 'min:5'),
                function ($attribute, $value, $fail) use ($require_strong_password) {
                    if ($require_strong_password == 1) {
                        if (!preg_match('/\d/', $value)) {
                            $fail('The password must contain a number');
                        } elseif (!preg_match('/[a-z]/', $value)) {
                            $fail('The password must contain a lowercase');
                        } elseif (!preg_match('/[A-Z]/', $value)) {
                            $fail('The password must contain an uppercase');
                        } elseif (!preg_match('/[\W_]/', $value)) {
                            $fail('The password must contain a symbol');
                        }
                    }
                }
            ],
        ]);

        
        //check to see if the password was used previously
        if (Hash::check($request->password, user()->password)) {
            return response()->json(validationError('You have used this password before'), 422);
        }

        //check to see if the password was used previously
        if (!Hash::check($request->current_password, user()->password)) {
            return response()->json(validationError('Your current password is incorrect'), 422);
        }


        //save the password
        $user = User::find(user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        //notify the user of the password change
        sendPasswordChangedEmail($user);

        return response()->json(['message' => 'Password updated succesfully']);
    }


    public function g2FaUpdate(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required|numeric',
        ]);

        $google2fa = new Google2FA();
        $valid = $google2fa->verifyKey(user()->g2fa_secret, $request->one_time_password);
        if ($valid) {
            $user = User::find(user()->id);
            if ($user->g2fa == 1) {
                // its enabled. disable now
                $user->g2fa = 0;
                $message = '2FA disabled successfully';
            } else {
                $message = '2FA Enabled successfully';
                $user->g2fa = 1;
                session()->put('g2fa', 1);
            }

            $user->save();

            return response()->json(['message' => $message]);
        }

        return response()->json(validationError('Incorrect or expired 2fa code'), 422);
    }

    //upload profile picture
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:50000',
        ]);

        //upload
        $image = $request->file('photo');
        $path = 'profile';
        $photo = uploadImage($image, $path);

        $user = User::find(user()->id);
        $user->photo = $photo;
        $user->save();

        return response()->json(['message' => 'Account updated successfully']);
    }
}
