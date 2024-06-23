@extends('includes.menu')

@section('content')
    <h1>Create Employee Login</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('employees_login.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="EmployeeCode">Employee Code</label>

                    <select  id="emp-select" name="EmployeeCode" class="form-control" required>
                        <option value="" selected disabled>Select Employee</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->EmployeeCode }}">{{ $employee->FirstName }} {{ $employee->LastName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="Role" name="Role" class="form-control" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->RoleID }}">{{ $role->RoleName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name1" name="name" class="form-control" readonly>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#emp-select').change(function() {
                var studentID = $(this).val();
                if (studentID == "") {
                    $('#courses').hide();
                    return;
                }
                $.ajax({
                    url: "{{ url('employees_login/show') }}/" + studentID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#name1').html('');
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('Error: ' + errorThrown);
                    }
                });

            });
        });
    </script>
@endsection
