<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('/');
        }

    }

    public function authenticate(LoginRequest $request)
    {
        $data = $request->validated();
        $credentials = $request->only('mobile_no', 'password');
        // $remember_me = $request->has('remember_token') ? true : false;

        if (Auth::attempt($credentials)) {

            return redirect()->route('home')->with('message', 'You are login Successfully.');
        }
        else{
            return redirect()->route('/')->with(['Input' => $request->only('mobile_no','password'), 'error' => 'Your Mobile Number and Password do not match our records!']);
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('/')->with('message', 'You are logout Successfully.');
    }
}
