<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller


{
    public function login()
    {
        return view('auth.login');
    }

    public function AuthCheck(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:1',
        ]);

        try {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        } catch (\Exception $ex) {
            // Handle exceptions if needed
            return redirect()->route('login')->with('error', 'An error occurred');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/admin');
    }

    public function passwordUpdate(Request $request)
    {
       $request->validate([
            'old_password' => 'required',
            'password' => 'required',
       ]);
       
        $user = Auth::user();
        $currentPassword = $user->password;

        if (Hash::check($request->old_password, $currentPassword)) {
            if (!Hash::check($request->password, $currentPassword)) {
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('success', 'Password changed successfully. Please log in with your new password.');
            } else {
                return redirect()->back()->withInput()->with('error', 'New password cannot be the same as the old password.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Current password is incorrect.');
        }
    }
}
