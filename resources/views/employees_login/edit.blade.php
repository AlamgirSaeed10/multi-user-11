@extends('includes.menu')

@section('content')
    <h1>Edit Employee Login</h1>
    <form action="{{ route('employees_login.update', $employeesLogin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="EmployeeCode">Employee Code</label>
                    <input type="text" name="EmployeeCode" class="form-control" value="{{ $employeesLogin->EmployeeCode }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" name="FirstName" class="form-control" value="{{ $employeesLogin->FirstName }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="LastName">Last Name</label>
                    <input type="text" name="LastName" class="form-control" value="{{ $employeesLogin->LastName }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" class="form-control" value="{{ $employeesLogin->Email }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="Role" name="Role" class="form-control"  required>
                        @php
                            $roles = DB::table('roles')->get();
                        @endphp
                        @foreach ($roles as $value)
                        <option value="{{$value->RoleID}}">{{$value->RoleName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" class="form-control" value="{{ $employeesLogin->Password }}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ActiveStatus">Active Status</label>
            <input type="number" name="ActiveStatus" class="form-control" value="{{ $employeesLogin->ActiveStatus }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
