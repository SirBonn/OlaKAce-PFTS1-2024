<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginFromRegister()
    {

    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string',
            'password' => 'required|string|min:8',
        ]);


        $credentials = $request->only('nickname', 'password');


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()->withErrors([
            'nickname' => 'The provided credentials do not match our records.',
        ]);
    }
}
