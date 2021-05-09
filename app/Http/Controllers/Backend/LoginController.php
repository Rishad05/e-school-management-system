<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (){
        return view('backend.content.loginRegistration.login');
    }
    public function accessLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();

                return redirect()->route('dashboard');

        }
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);

    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout Successful.');
    }
}
