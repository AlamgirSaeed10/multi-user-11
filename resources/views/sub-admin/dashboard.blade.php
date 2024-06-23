@extends('includes.menu')

@section('content')
    <h2 class="mb-4">Sub Admin</h2>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="font-weight-bold">Employee List</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Joining Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee_list as $employee)
                            <tr>
                                <td>{{ $employee->EmployeeCode }}</td>
                                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                                <td>{{ $employee->Email }}</td>
                                <td>{{ $employee->Department }}</td>
                                <td>{{ $employee->Designation }}</td>
                                <td>{{ $employee->JoiningDate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            <h5 class="font-weight-bold">Attendance List</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Employee Fullname</th>
                            <th>Date</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendance_list as $attendance)
                            <tr>
                                <td>{{ $attendance->employee_id }}</td>
                                <td>
                                    @if ($attendance->employee)
                                        {{ $attendance->employee->FirstName }} {{ $attendance->employee->LastName }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->in_time }}</td>
                                <td>{{ $attendance->out_time ?: 'N/A' }}</td>
                                <td>
                                    @if ($attendance->status == 'Present')
                                        <span class="badge badge-success">{{ $attendance->status }}</span>
                                    @elseif ($attendance->status == 'Absent')
                                        <span class="badge badge-danger">{{ $attendance->status }}</span>
                                    @elseif ($attendance->status == 'Leave')
                                        <span class="badge badge-warning">{{ $attendance->status }}</span>
                                    @else
                                        {{ $attendance->status }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
