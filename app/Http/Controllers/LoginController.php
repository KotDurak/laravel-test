<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->get('remember');

        if (Auth::attempt($credentials, (bool)$remember)) {
            return redirect('users');
        }
    }
}
