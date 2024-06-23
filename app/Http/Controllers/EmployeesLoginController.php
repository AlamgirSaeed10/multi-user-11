<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeesLogin;
use App\Models\Employees;
use App\Models\Role;

class EmployeesLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();
        $roles = Role::all();
        return view('employees_login.index', compact('employees', 'roles'));
    }

    public function show($employeeCode)
    {
        $employee = Employees::where('EmployeeCode', $employeeCode)->first();

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employees::all();
        $roles = Role::all();
        return view('employees_login.create', compact('employees', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'EmployeeCode' => 'required',
            'Role' => 'required',
            'Password' => 'required',
        ]);

        $employee = Employees::where('EmployeeCode', $request->EmployeeCode)->firstOrFail();

        $employeesLogin = new EmployeesLogin();
        $employeesLogin->EmployeeCode = $request->EmployeeCode;
        $employeesLogin->Role = $request->Role;
        $employeesLogin->Name = $employee->FirstName . ' ' . $employee->LastName;
        $employeesLogin->Password = bcrypt($request->Password); // Hash the password before saving

        $employeesLogin->save();

        return redirect()->route('employees_login.index')
            ->with('success', 'Employee login created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeesLogin = EmployeesLogin::findOrFail($id);
        $employees = Employees::all();
        $roles = Role::all();
        return view('employees_login.edit', compact('employeesLogin', 'employees', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'EmployeeCode' => 'required',
            'Role' => 'required',
            'Password' => 'required',
        ]);

        $employeesLogin = EmployeesLogin::findOrFail($id);
        $employee = Employees::where('EmployeeCode', $request->EmployeeCode)->firstOrFail();

        $employeesLogin->EmployeeCode = $request->EmployeeCode;
        $employeesLogin->Role = $request->Role;
        $employeesLogin->Name = $employee->FirstName . ' ' . $employee->LastName;
        $employeesLogin->Password = bcrypt($request->Password); // Hash the password before saving

        $employeesLogin->save();

        return redirect()->route('employees_login.index')
            ->with('success', 'Employee login updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeesLogin = EmployeesLogin::findOrFail($id);
        $employeesLogin->delete();

        return redirect()->route('employees_login.index')
            ->with('success', 'Employee login deleted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $employeesLogin = EmployeesLogin::findOrFail($id);
    //     return view('employees_login.show', compact('employeesLogin'));
    // }
}
