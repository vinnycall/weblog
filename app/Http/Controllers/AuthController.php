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

    return redirect()->route('login')->with('success', 'Registratie succesvol! Log nu in.');
}

public function showLoginForm()
{
return view('auth.login');
}
public function login(Request $request)
{
    $credentials = $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);

    if (Auth::attempt($credentials))
    {
        return redirect()->route('dashboard')->with('success', 'Je bent ingelogd!');
    }
    return back()->withErrors(['email' => 'Ongeldige inloggegevens']);
}

public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Je bent uitgelogd!');
    }



}