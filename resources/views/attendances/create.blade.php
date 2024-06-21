<!-- resources/views/attendances/create.blade.php -->

@extends('includes.menu')

@section('content')
    <div class="container mt-4">
        <h1>Create Attendance</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select class="form-control" id="employee_id" name="employee_id" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->EmployeeCode }}">{{ $employee->FirstName }} {{ $employee->LastName }}
                            ({{ $employee->EmployeeCode }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="in_time">In Time</label>
                <input type="time" class="form-control" id="in_time" name="in_time" required>
            </div>
            <div class="form-group">
                <label for="out_time">Out Time</label>
                <input type="time" class="form-control" id="out_time" name="out_time">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Leave">Leave</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Attendance</button>
        </form>
    </div>
@endsection
