<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('KTA')) {
                return redirect()->route('kta.index');
            } elseif ($user->hasRole('Admin Jurusan')) {
                return redirect()->route('jurusan.index');
            } elseif ($user->hasRole('Mahasiswa')) {
                return redirect()->route('mahasiswa.index');
            } else {
                return redirect()->route('login')->withErrors('Role tidak dikenali.');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
