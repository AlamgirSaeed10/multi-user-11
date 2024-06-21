<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return view('attendances.index', compact('attendances'));
    }
    public function create()
    {
        $employees = Employees::all();
        return view('attendances.create', compact('employees'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,EmployeeCode',
            'date' => 'required|date',
            'in_time' => 'required|date_format:H:i',
            'out_time' => 'nullable|date_format:H:i',
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,EmployeeCode',
            'date' => 'required|date',
            'in_time' => 'required|date_format:H:i',
            'out_time' => 'nullable|date_format:H:i',
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }
    public function mark(Request $request)
    {
        $employeeId = Auth::id(); // Get the authenticated employee's ID
        $date = now()->toDateString();

        // Check if there is already an attendance record for today
        $attendance = Attendance::where('employee_id', $employeeId)
            ->whereDate('date', $date)
            ->first();

        // If attendance record doesn't exist for today or if the employee hasn't marked out within 5 minutes of cutoff time
        if (!$attendance || (now()->diffInMinutes(now()->setTime(15, 0)) <= 5 && !$attendance->out_time)) {
            Attendance::updateOrCreate(
                [
                    'employee_id' => $employeeId,
                    'date' => $date,
                ],
                [
                    'in_time' => now(),
                    'status' => 'Present', // You can customize status logic as per your requirement
                ]
            );

            return redirect()->back()->with('success', 'Attendance marked successfully.');
        } else {
            return redirect()->back()->with('error', 'Attendance already marked for today.');
        }
    }
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employees::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }
    public function destroy($id)
    {

        Attendance::findOrFail($id)->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
    public function showMonthAttendance(Employees $employee, $year, $month)
    {

        $attendances = $employee->attendances()
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        return view('attendances.month', compact('employee', 'attendances', 'year', 'month'));
    }
    public function show($employeeCode)
    {
        // Find employee by EmployeeCode
        $employee = Employees::where('EmployeeCode', $employeeCode)->first();

        if (!$employee) {
            abort(404, 'Employee not found');
        }

        // Get attendance records for the employee
        $attendances = Attendance::where('employee_id', $employeeCode)->orderBy('date', 'desc')->get();

        return view('attendances.show', [
            'employee' => $employee,
            'attendances' => $attendances,
        ]);
    }
}
