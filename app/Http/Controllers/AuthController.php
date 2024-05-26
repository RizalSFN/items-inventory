<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('authentication.login', compact('title'));
        }
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
