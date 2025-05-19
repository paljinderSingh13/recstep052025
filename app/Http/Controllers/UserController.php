<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Display the password reset form
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Attempt to reset the password
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        // Check if the password reset was successful
        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($response));
        }

        throw ValidationException::withMessages([
            'email' => [trans($response)],
        ]);
    }
    public function success()
    {
        //
        return view('user.success');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

     public function resetpassword()
    {
        //
        return view('user.resetpassword');
    } 

    public function updatePassword(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ], [
            'newpassword.confirmed' => 'The new password and confirmation password do not match.',
        ]);

        // Check if the old password matches the authenticated user's password
        if (!Hash::check($request->oldpassword, Auth::user()->password)) {
            return back()->withErrors(['oldpassword' => 'The old password is incorrect.']);
        }

        // Update the user's password
        Auth::user()->update([
            'password' => Hash::make($request->newpassword),
        ]);

        // Redirect back with a success message
        return redirect()->route('club.dashboard')->with('success', 'Password updated successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
