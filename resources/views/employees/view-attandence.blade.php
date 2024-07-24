
@extends('includes.emp-menu')

@section('content')
<div class="col-lg-12">

    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
            Employees Detail
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <th>Sr.</th>
                        <th>Emp Code</th>
                        <th>Fullname</th>
                        <th>D.O.B</th>
                        <th>Father Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($emp_list as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->EmployeeCode }}</td>
                                <td>{{ $value->FirstName }} {{ $value->LastName }}</td>
                                <td>{{ date('F m, Y', strtotime($value->DateOfBirth)) }}</td>
                                <td>{{ $value->FatherName }}</td>
                                <td>{{ $value->ContactNo }}</td>
                                <td>{{ $value->Email }}</td>
                                <td>{{ $value->Department }}</td>
                                <td>{{ $value->JoiningDate }}</td>

                                <td>
                                    <a href="{{ route('emp-attendance.show', $value->EmployeeCode) }}" class="btn btn-info"><span
                                        class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection
