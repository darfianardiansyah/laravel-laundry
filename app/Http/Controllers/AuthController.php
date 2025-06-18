<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {

        return view('auth.login');
    }

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return back()->withErrors([
                'email' => 'Email not found'
            ]);
        }

        if(!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return back()->withErrors([
                'password' => 'Incorrect password',
            ]);
        }


        return redirect()->route('dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}
