<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
// Registratieformulier tonen
public function showRegisterForm()
{
    return view('auth.register');
}
public function register(Request $request)
{
    // TODO :: validatie doen in Requests
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registration complete! Please login.');
}

public function showLoginForm()
{
return view('auth.login');
}
public function login(Request $request)
{
    $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    // TODO :: validatie doen in Requests
    $request->validate([
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = [
        $loginField => $request->input('login'),
        'password'=>$request->input('password'),
    ];

    if (Auth::attempt($credentials))
    {
        return redirect()->route('dashboard')->with('success', 'You\'re now logged in!');
        
    }
    return back()->withErrors([
        'login' => 'The username and/or password you entered is invalid',
        ])->onlyInput('login');
}

public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Je bent uitgelogd!');
    }



}

