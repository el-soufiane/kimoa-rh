<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function dologin(LoginRequest  $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return view('layouts.dashboard');
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Email invalide',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }
}


