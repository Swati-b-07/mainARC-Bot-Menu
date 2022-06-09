<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Auth;
use Validator;
use Redirect;

class RoleController extends Controller
{
    public $user;
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::guard('admin')->user();
        //     return $next($request);
        // });
    }

    public function index()
    {
        // if (is_null($this->user) || !$this->user->can('role.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any role !');
        // }
        $data['roleData'] = Role::all();
        return view('admin.role.list', $data);
    }

    public function create(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('role.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to create any role !');
        // }
        $data['all_permissions']  = Permission::all();
        return view('admin.role.form');
    }
    public function edit($id)
    {
        $data['singleRecord'] = Role::where('id', $id)->first();
        return view('admin.role.form', $data);
    }

    public function store(Request $request)
    {   
        try{
            $rules = [
                'name' => 'required|unique:roles',
                'level' => 'required',
            ];
            $message = [
                'name.required' => trans('Name is required!'),
                'level' => trans('Level is required!'),
            ];
           
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
            $permissions = $request->permissions;

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            return redirect()->route('role.list')->with(['success_msg' => 'Role added successfully.']);
        }catch(Exception $e){
            return redirect()->route('role.list')->with(['error_msg' => 'Something went wrong']);
        }
    }
    public function delete($id) 
    {
        $deleteRole = Role::where('id', $id)->delete();
        return redirect()->route('role.list')->with(['success_msg' => 'Role deleted successfully.']);
    }
}
