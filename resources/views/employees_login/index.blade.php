@extends('includes.menu')

@section('content')
    <h1>Employee Logins</h1>
    <a href="{{ route('employees_login.create') }}" class="btn btn-primary mb-3">Create Employee Login</a>
    <table class="table">
        <thead>
            <tr>
                <th>Employee Code</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employeesLogins as $employeesLogin)
                <tr>
                    <td>{{ $employeesLogin->EmployeeCode }}</td>
                    <td>{{ $employeesLogin->FirstName }}</td>
                    <td>{{ $employeesLogin->LastName }}</td>
                    <td>{{ $employeesLogin->Email }}</td>
                    <td>{{ $employeesLogin->Role }}</td>
                    <td>{{ $employeesLogin->ActiveStatus }}</td>
                    <td>
                        <a href="{{ route('employees_login.edit', $employeesLogin->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>
                            Edit</a>

                        @if ($employeesLogin->ActiveStatus)
                            <form action="{{ route('employees_login.ban', $employeesLogin->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-gavel" aria-hidden="true"></i>
                                    Ban</button>
                            </form>
                        @else
                            <form action="{{ route('employees_login.active', $employeesLogin->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-unlock" aria-hidden="true"></i>
                                    Activate</button>
                            </form>
                        @endif

                        <form action="{{ route('employees_login.destroy', $employeesLogin->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
