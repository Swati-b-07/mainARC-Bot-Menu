<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use DB;
use Auth;
use Validator;
use Redirect;

class PermissionController extends Controller
{
    public function index()
    {
        $data['permissionData'] = Permission::get();
        return view('admin.permission.list', $data);
    }

    public function create(Request $request)
    {
        return view('admin.permission.form');
    }
    public function edit($id)
    {
        $data['singleRecord'] = Permission::where('id', $id)->first();
        return view('admin.permission.form', $data);
    }

    public function store(Request $request)
    {
        try{
            $rules = [
                'name' => 'required',
                'model' => 'required',
            ];
            $message = [
                'name.required' => trans('Name is required!'),
                'model' => trans('Model is required!'),
            ];
           
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        
            return redirect()->route('permission.list')->with(['success_msg' => 'Permission added successfully.']);
        }catch(Exception $e) {
            return redirect()->route('permission.list')->with(['error_meg' => 'Something went wrong']);

        }
    }
    public function delete($id) 
    {
        $deletePermission = Permission::where('id', $id)->delete();
        return redirect()->route('permission.list')->with(['success_msg' => 'Permission deleted successfully.']);
    }
}
