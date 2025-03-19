<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function toLogin(LoginRequest $req) {
        $etatLog = $req->validated();
        if (Auth::attempt($etatLog)) {
            session()->regenerate();
            return redirect()->intended(route('sports.index'));
        }
        return to_route('login')->withErrors(["email" => 'Email ou mot de passe invalide'])->withInput(['email', 'password']);
    }

    public function logout() {
        Auth::logout();
        return to_route('sports.index');
    }
}
