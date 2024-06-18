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

        $credentials = [];
        $credentials['employee_code'] = $request->input('employee_code_or_mobile_no');
        $credentials['mobile_no'] = $request->input('employee_code_or_mobile_no');
        $credentials['password'] = $request->input('password');
        $remember_me = $request->has('remember_token')? true : false;

        // dd($credentials);
        if (Auth::attempt([
            'employee_code' => $credentials['employee_code'],
            'password' => $credentials['password']
        ], $remember_me)) {

            return redirect()->route('home')->with('message', 'You are login Successfully.');
        }
        elseif (Auth::attempt([
            'mobile_no' => $credentials['mobile_no'],
            'password' => $credentials['password']
        ], $remember_me)) {

            return redirect()->route('home')->with('message', 'You are login Successfully.');
        }
        else{
            return redirect()->route('/')->with(['Input' => $request->only('employee_code_or_mobile_no','password'), 'error' => 'Your Employee Id / Mobile Number and Password do not match our records!']);
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('/')->with('message', 'You are logout Successfully.');
    }
}
