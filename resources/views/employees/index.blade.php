@extends('includes.menu')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-gray-800">Manage Employees</h5>
        <a href="{{ route('employees.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user-plus fa-sm text-white-50"></i>Add Employee</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">



        @foreach ($employees as $key => $value)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset($value->EmployeeImage) }}"
                                class="p-2 custom_round_border rounded-circle mb-2" alt="Cinque Terre" width="200"
                                height="200">
                            <h5 class="card-title p-2">{{ $value->FirstName }} {{ $value->LastName }}</h5>
                        </div>
                        <div class="dates">
                            <div class="start">
                                <strong>Joining</strong> {{ date('d-m-Y', strtotime($value->created_at)) }}
                                <span></span>
                            </div>
                            <div class="ends">
                                <strong>Leaving</strong> <small
                                    class="text-capitalize font-weight-bold text-success">Working</small>
                            </div>
                        </div>

                        <div class="stats mb-2"> @php



                        @endphp
                            @php
                            $total_days = 30;
                            $pre_days = 0 ;
                            $lea_days = 0;
                            $abs_days = 0;
                                $attendLeave = DB::table('attendances')
                                    ->where('employee_id', $value->EmployeeCode)
                                    ->where('status', 'Leave')
                                    ->count();
                                    ;
                                $attendAbsent = DB::table('attendances')
                                    ->where('employee_id', $value->EmployeeCode)
                                    ->where('status', 'Absent')
                                    ->count();
                                $attendPresent = DB::table('attendances')
                                    ->where('employee_id', $value->EmployeeCode)
                                    ->where('status', 'Present')
                                    ->count();
                                    $pre_days = $total_days - ($attendLeave + $attendAbsent);
                                    $lea_days = $total_days - ($attendPresent + $attendAbsent);
                                    $abs_days = $total_days - ($attendPresent + $attendLeave);
                            @endphp
                            <div>
                                <strong>PRESENT</strong> {{ $pre_days}}
                            </div>
                            <div>
                                <strong>ABSENT</strong> {{ $lea_days }}
                            </div>
                            <div>
                                <strong>LEAVES</strong> {{ $abs_days }}
                            </div>
                        </div>

                        <div class="footer text-center">


                            <a href="{{ route('employees.show', $value->id) }}" class="btn btn-info"><span
                                    class="icon text-white-50">
                                    <i class="fas fa-eye"></i>
                                </span>View</a>
                            <a href="{{ route('employees.edit', $value->id) }}" class="btn btn-warning"> <span
                                    class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>Edit</a>
                            <form action="{{ route('employees.destroy', $value->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>Delete</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
