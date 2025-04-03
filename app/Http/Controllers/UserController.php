<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function enablePremium(){
        $user = Auth::user();
        $user->is_premium = true;
    
        $user->save();
    
        return redirect()->route('dashboard')->with('status', 'Your premium status has been updated!');
    }
    public function disablePremium(){
        $user = Auth::user();
        $user->is_premium = false;
    
        $user->save();
    
        return redirect()->route('dashboard')->with('status', 'Your premium status has been updated!');
    }
}
