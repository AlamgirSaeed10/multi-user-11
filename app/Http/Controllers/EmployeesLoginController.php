<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesLoginController extends Controller
{
    public function index()
    {
        $employeesLogins = Employees::all();
        return view('employees_login.index', compact('employeesLogins'));
    }

    public function create()
    {
        return view('employees_login.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'EmployeeCode' => 'required|unique:employees_logins',
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required|email|unique:employees_logins',
            'Role' => 'required',
            'Password' => 'required',
            'ActiveStatus' => 'required|integer',
        ]);

        Employees::create($request->all());

        return redirect()->route('employees_login.index')->with('success', 'Employee Login created successfully.');
    }

    public function edit($id)
    {
        $employeesLogin = Employees::findOrFail($id);
        return view('employees_login.edit', compact('employeesLogin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'EmployeeCode' => 'required|unique:employees_logins,EmployeeCode,' . $id,
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required|email|unique:employees_logins,Email,' . $id,
            'Role' => 'required',
            'Password' => 'required',
            'ActiveStatus' => 'required|integer',
        ]);

        $employeesLogin = Employees::findOrFail($id);
        $employeesLogin->update($request->all());

        return redirect()->route('employees_login.index')->with('success', 'Employee Login updated successfully.');
    }

    public function ban($id)
    {
        $employeesLogin = Employees::findOrFail($id);
        $employeesLogin->ActiveStatus = 0;
        $employeesLogin->save();

        return redirect()->route('employees_login.index')->with('success', 'Employee Login banned successfully.');
    }

    public function active($id)
    {
        $employeesLogin = Employees::findOrFail($id);
        $employeesLogin->ActiveStatus = 1;
        $employeesLogin->save();

        return redirect()->route('employees_login.index')->with('success', 'Employee Login activated successfully.');
    }

    public function destroy($id)
    {
        $employeesLogin = Employees::findOrFail($id);
        $employeesLogin->delete();

        return redirect()->route('employees_login.index')->with('success', 'Employee Login deleted successfully.');
    }
}
