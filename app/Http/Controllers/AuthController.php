<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('title', 'Login');
    }

    public function dologin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->attempt($credentials)) {

            $request->session()->regenerate();
            return redirect('/')->with('success', 'Kamu Berhasil Login');
        }

        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Kamu berhasil log-out');
    }

    public function register(){
        return view('auth.register')->with('title', 'Register');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->intended('/')->with('success', 'Anda berhasil mendaftar dan Login');
    }

}
