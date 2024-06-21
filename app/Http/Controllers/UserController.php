<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function dashboard()
    {

        $emp_list = DB::table('employees')->where('id',Auth::user()->id)->get();
        return view('employees.dashboard',compact('emp_list'));
    }
}
