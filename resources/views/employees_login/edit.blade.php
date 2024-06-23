@extends('includes.menu')

@section('content')
    <h1>Edit Employee Login</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employees_login.update', $employeesLogin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="EmployeeCode">Employee Code</label>
                    <select id="EmployeeCode" name="EmployeeCode" class="form-control" required>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->EmployeeCode }}" {{ $employee->EmployeeCode == $employeesLogin->EmployeeCode ? 'selected' : '' }}>{{ $employee->FirstName }} {{ $employee->LastName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="Role" name="Role" class="form-control" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->RoleID }}" {{ $role->RoleID == $employeesLogin->Role ? 'selected' : '' }}>{{ $role->RoleName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $employeesLogin->Name }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@section('scripts')
    <script src="https://code
