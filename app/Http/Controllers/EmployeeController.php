<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employees::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'EmployeeCode' => 'required|unique:employees',
            'FirstName' => 'required',
            'LastName' => 'required',
            'DateOfBirth' => 'required|date',
            'FatherName' => 'required',
            'ContactNo' => 'required',
            'CNIC' => 'required|unique:employees',
            'Gender' => 'required',
            'Email' => 'required|email|unique:employees',
            'Qualification' => 'required',
            'MaterialStatus' => 'required',
            'Department' => 'required',
            'Designation' => 'required',
            'Shift' => 'required',
            'JoiningDate' => 'required|date',
            'Address' => 'required',
            'EmergencyContactName' => 'required',
            'EmergencyContactRelation' => 'required',
            'EmergencyContactNo' => 'required',
            'EmergencyContactAddress' => 'required',
            'BankName' => 'required',
            'BankIBAN' => 'required',
            'AccHolderName' => 'required',
            'EmployeeImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ActiveStatus' => 'required|integer',
        ]);

        $employee = new Employees($request->all());

        if ($request->hasFile('EmployeeImage')) {
            $image = $request->file('EmployeeImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/emp-imgs'), $imageName);
            $employee->EmployeeImage = 'assets/emp-imgs/' . $imageName;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employees $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employees $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employees $employee)
    {
        $request->validate([
            'EmployeeCode' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'DateOfBirth' => 'required|date',
            'FatherName' => 'required',
            'ContactNo' => 'required',
            'CNIC' => 'required',
            'Gender' => 'required',
            'Email' => 'required|email',
            'Qualification' => 'required',
            'MaterialStatus' => 'required',
            'Department' => 'required',
            'Designation' => 'required',
            'Shift' => 'required',
            'JoiningDate' => 'required|date',
            'Address' => 'required',
            'EmergencyContactName' => 'required',
            'EmergencyContactRelation' => 'required',
            'EmergencyContactNo' => 'required',
            'EmergencyContactAddress' => 'required',
            'BankName' => 'required',
            'BankIBAN' => 'required',
            'AccHolderName' => 'required',
            'EmployeeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ActiveStatus' => 'required|integer',
            'Role' => 'required',
            'Password' => 'required',

        ]);

        $employee->fill($request->except('EmployeeImage'));

        if ($request->hasFile('EmployeeImage')) {
            // Delete the old image if it exists
            if ($employee->EmployeeImage) {
                $oldImagePath = public_path($employee->EmployeeImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('EmployeeImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/emp-imgs'), $imageName);
            $employee->EmployeeImage = 'assets/emp-imgs/' . $imageName;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }


    public function destroy(Employees $employee)
    {
        // Delete image if exists
        if ($employee->EmployeeImage) {
            $imagePath = public_path($employee->EmployeeImage);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
