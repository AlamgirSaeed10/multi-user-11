
@extends('includes.emp-menu')

@section('content')
    <div class="container">
        <h1>Attendance for {{ $employee->FirstName }} {{ $employee->LastName }} ({{ $employee->EmployeeCode }})</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->in_time }}</td>
                        <td>{{ $attendance->out_time }}</td>
                        <td>{{ $attendance->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employees List</a>
    </div>
@endsection
