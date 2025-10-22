<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        // Implementasi registrasi pengguna baru
        $user = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user['password'] = Hash::make($user['password']);

        $user = User::create($user);
        return redirect('/home')->with('success', 'Registrasi berhasil dan Anda sudah login!');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}