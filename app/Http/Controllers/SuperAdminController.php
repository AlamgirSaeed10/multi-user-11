<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        $total_emp = count(DB::table('employees')->get());
        $total_task = count(DB::table('tasks')->get());

        $emp_list = Employees::where('id','!=',Auth::user()->id)->get();
        return view('super-admin.dashboard',compact('emp_list','total_emp','total_task'));
    }

    public function users()
    {
        $emp_list = User::with('roles')->where('RoleID','!=',1)->get();
        return view('super-admin.users', compact('emp_list'));
    }

    public function manageRole()
    {
        $users = User::where('RoleID','!=',1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }

}
