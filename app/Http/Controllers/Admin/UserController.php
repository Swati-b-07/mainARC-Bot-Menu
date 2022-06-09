<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use DB;
use Auth;
use Validator;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        $data['userData'] = User::get();
        return view('admin.user.list', $data);
    }

    public function create(Request $request)
    {
        return view('admin.user.form', $data);
    }
    public function edit($id)
    {
        $data['singleRecord'] = User::where('id', $id)->first();
        return view('admin.user.form', $data);
    }

    public function store(Request $request)
    {
        try{
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
        
            return redirect()->route('user.list')->with(['success_msg' => 'user added successfully.']);

        }catch(Exception $e){
            return redirect()->route('user.list')->with(['error_msg' => 'Something went wrong.']);
        }
    }
    public function delete($id) 
    {
        return redirect()->route('user.list')->with(['success_msg' => 'user deleted successfully.']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
