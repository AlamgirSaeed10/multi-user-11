@extends('includes.menu')

@section('content')
    <div class="container">
        <h1>Employee Login Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Employee Code: {{ $employeesLogin->EmployeeCode }}</h5>
                <p class="card-text">Role: {{ $employeesLogin->role->RoleName }}</p>
                <p class="card-text">Password: {{ $employeesLogin->Password }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('employees_login.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
@endsection
