<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Session extends Controller
{
    //

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        /* if(Auth::attempt($attributes))
        { */
            session()->regenerate();
            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        /* }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        } */
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
