<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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
        // validatie middels requests

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration complete! Please login.');
    }
    public function premium()
    {
        return view('premium');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {        
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginField => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('myposts')->with('success', 'You\'re now logged in!');
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
    public function dashboard()
    {
        $user = Auth::user();
        $username = request()->query('username');
        return view('dashboard', compact('user', 'username'));
    }
}
