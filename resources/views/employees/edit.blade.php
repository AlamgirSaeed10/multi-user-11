@extends('includes.menu')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmployeeCode">Employee Code</label>
                        <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode"
                            value="{{ $employee->EmployeeCode }}" required readonly>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName"
                            value="{{ $employee->FirstName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName"
                            value="{{ $employee->LastName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth"
                            value="{{ $employee->DateOfBirth }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="FatherName">Father's Name</label>
                        <input type="text" class="form-control" id="FatherName" name="FatherName"
                            value="{{ $employee->FatherName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="ContactNo">Contact Number</label>
                        <input type="text" class="form-control" id="ContactNo" name="ContactNo"
                            value="{{ $employee->ContactNo }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="CNIC">CNIC</label>
                        <input type="text" class="form-control" id="CNIC" name="CNIC"
                            value="{{ $employee->CNIC }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <select class="form-control" id="Gender" name="Gender" required>
                            <option value="Male" {{ $employee->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Male" {{ $employee->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $employee->Gender == 'Female' ? 'selected' : '' }}>Female
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email"
                            value="{{ $employee->Email }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Qualification">Qualification</label>
                        <input type="text" class="form-control" id="Qualification" name="Qualification"
                            value="{{ $employee->Qualification }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="MaterialStatus">Marital Status</label>
                        <input type="text" class="form-control" id="MaterialStatus" name="MaterialStatus"
                            value="{{ $employee->MaterialStatus }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Department">Department</label>
                        <input type="text" class="form-control" id="Department" name="Department"
                            value="{{ $employee->Department }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <input type="text" class="form-control" id="Designation" name="Designation"
                            value="{{ $employee->Designation }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Shift">Shift</label>
                        <input type="text" class="form-control" id="Shift" name="Shift"
                            value="{{ $employee->Shift }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="JoiningDate">Joining Date</label>
                        <input type="date" class="form-control" id="JoiningDate" name="JoiningDate"
                            value="{{ $employee->JoiningDate }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address"
                            value="{{ $employee->Address }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmergencyContactName">Emergency Contact Name</label>
                        <input type="text" class="form-control" id="EmergencyContactName" name="EmergencyContactName"
                            value="{{ $employee->EmergencyContactName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmergencyContactRelation">Emergency Contact Relation</label>
                        <input type="text" class="form-control" id="EmergencyContactRelation"
                            name="EmergencyContactRelation" value="{{ $employee->EmergencyContactRelation }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmergencyContactNo">Emergency Contact Number</label>
                        <input type="text" class="form-control" id="EmergencyContactNo" name="EmergencyContactNo"
                            value="{{ $employee->EmergencyContactNo }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmergencyContactAddress">Emergency Contact Address</label>
                        <input type="text" class="form-control" id="EmergencyContactAddress"
                            name="EmergencyContactAddress" value="{{ $employee->EmergencyContactAddress }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="BankName">Bank Name</label>
                        <input type="text" class="form-control" id="BankName" name="BankName"
                            value="{{ $employee->BankName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="BankIBAN">Bank IBAN</label>
                        <input type="text" class="form-control" id="BankIBAN" name="BankIBAN"
                            value="{{ $employee->BankIBAN }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="AccHolderName">Account Holder Name</label>
                        <input type="text" class="form-control" id="AccHolderName" name="AccHolderName"
                            value="{{ $employee->AccHolderName }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="EmployeeImage">Employee Image</label>
                        <input type="file" class="form-control-file" id="EmployeeImage" name="EmployeeImage">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input id="password" type="text" class="form-control" name="Password" value="{{ $employee->Password }}" readonly>

                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select class="form-control" id="Role" name="Role" required>
                            @php
                                $roles = DB::table('roles')->get();
                            @endphp
                            @foreach ($roles as $value)
                            <option value="{{$value->RoleID}}">{{$value->RoleName}} [{{$value->RoleID}}]</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="ActiveStatus">Active Status</label>
                        <input type="number" class="form-control" id="ActiveStatus" name="ActiveStatus"
                            value="{{ $employee->ActiveStatus }}" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
