<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check()))
        {
            return redirect('admin/dashboard');
        }
        
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {

        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', 'Incorrect Email or Password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
