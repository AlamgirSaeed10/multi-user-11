<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\User;

class SubAdminController extends Controller
{
    //
    public function dashboard()
    {
        $employee_list = Employees::all();
        $attendance_list = Attendance::all();

        return view('sub-admin.dashboard',compact('employee_list','attendance_list'));
    }
}
