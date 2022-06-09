<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Hash;
use Validator;
use Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
    public function doLogin(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'email.required' => trans('Email is required!'),
            'password' => trans('Password is required!'),
        ];
       
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    
        $credentials = $request->only('email', 'password');
    //    dd($credentials);
        if (Auth::attempt($credentials)) {
            /*if(Auth::id() != 1 && Auth::id() != 2) {
                $allPermissions = 
            }*/
            return redirect()->route('dashboard')->with(['success_msg' => 'Logged in successfully.']);
        }
    
        return redirect()->route('login')->with(['error_msg' => 'Login details are not valid']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('admin.login')->with(['success_msg' => 'Logged out successfully.']);
    }
}
