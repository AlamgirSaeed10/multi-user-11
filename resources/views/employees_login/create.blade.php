@extends('includes.menu')

@section('content')
    <h1>Create Employee Login</h1>
    <form action="{{ route('employees_login.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="EmployeeCode">Employee Code</label>
                    <select id="EmployeeCode" name="EmployeeCode" class="form-control" required>
                        @php
                            $roles = DB::table('employees')->get();
                        @endphp
                        @foreach ($roles as $value)
                            <option value="{{ $value->EmployeeCode }}">{{ $value->FirstName }} {{ $value->LastName }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="Role" name="Role" class="form-control" required>
                        @php
                            $roles = DB::table('roles')->get();
                        @endphp
                        @foreach ($roles as $value)
                            <option value="{{ $value->RoleID }}">{{ $value->RoleName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
