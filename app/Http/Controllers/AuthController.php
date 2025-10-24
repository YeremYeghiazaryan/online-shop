<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function indexLogin()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }

        return view('auth.login');
    }
    public function indexRegister()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }
        return view('auth.register');
    }

    public function login(Request $request)
    {
       $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!User::where('email', $validatedData['email'])->first()) {
            return back()->withErrors(['email' => 'This email is not registered'])->withInput();
        }

        if (!Auth::attempt(
            ['email' => $validatedData['email'], 'password' => $validatedData['password']]
        )) {
            return back()->withErrors(['password' => 'This password is not registered'])->withInput();
        }

        return redirect()->route('dashboard.index');


    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login.index');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }


}
