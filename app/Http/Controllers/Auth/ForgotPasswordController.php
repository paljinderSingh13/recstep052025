<?php

// App/Http/Controllers/Auth/ForgotPasswordController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPassword;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('user.forgotpassword');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                $user->notify(new CustomResetPassword($token));
            }
        );

        return $status === Password::RESET_LINK_SENT
                    ? redirect()->route('user.success')->with('status', __($status)) : back()->withErrors(['email' => __($status)]);
    }
}
