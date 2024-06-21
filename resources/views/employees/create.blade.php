@extends('includes.menu')

@section('content')

        <h1>Add Employee</h1>
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmployeeCode">Employee Code</label>
                        <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="FatherName">Father's Name</label>
                        <input type="text" class="form-control" id="FatherName" name="FatherName" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="ContactNo">Contact Number</label>
                        <input type="text" class="form-control" id="ContactNo" name="ContactNo" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="CNIC">CNIC</label>
                        <input type="text" class="form-control" id="CNIC" name="CNIC" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <select class="form-control" id="Gender" name="Gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Qualification">Qualification</label>
                        <input type="text" class="form-control" id="Qualification" name="Qualification" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="MaterialStatus">Marital Status</label>
                        <input type="text" class="form-control" id="MaterialStatus" name="MaterialStatus" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Department">Department</label>
                        <input type="text" class="form-control" id="Department" name="Department" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <input type="text" class="form-control" id="Designation" name="Designation" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Shift">Shift</label>
                        <input type="text" class="form-control" id="Shift" name="Shift" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="JoiningDate">Joining Date</label>
                        <input type="date" class="form-control" id="JoiningDate" name="JoiningDate" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmergencyContactName">Emergency Contact Name</label>
                        <input type="text" class="form-control" id="EmergencyContactName" name="EmergencyContactName"
                            required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmergencyContactRelation">Emergency Contact Relation</label>
                        <input type="text" class="form-control" id="EmergencyContactRelation"
                            name="EmergencyContactRelation" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmergencyContactNo">Emergency Contact Number</label>
                        <input type="text" class="form-control" id="EmergencyContactNo" name="EmergencyContactNo"
                            required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmergencyContactAddress">Emergency Contact Address</label>
                        <input type="text" class="form-control" id="EmergencyContactAddress"
                            name="EmergencyContactAddress" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="BankName">Bank Name</label>
                        <input type="text" class="form-control" id="BankName" name="BankName" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="BankIBAN">Bank IBAN</label>
                        <input type="text" class="form-control" id="BankIBAN" name="BankIBAN" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="AccHolderName">Account Holder Name</label>
                        <input type="text" class="form-control" id="AccHolderName" name="AccHolderName" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="EmployeeImage">Employee Image</label>
                        <input type="file" class="form-control" id="EmployeeImage" name="EmployeeImage">
                    </div>
                </div>

                {{-- <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Gender">Role</label>
                        <select class="form-control" id="Role" name="Role" required>
                            @php
                                $roles = DB::table('roles')->get();
                            @endphp
                            @foreach ($roles as $value)
                                <option value="{{ $value->RoleID }}" class="text-capitalize">{{ $value->RoleName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="Password">Active Status</label>
                        <input type="password" class="form-control" id="Password" name="Password" required>
                    </div>
                </div> --}}

                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="ActiveStatus">Active Status</label>
                        <input type="number" class="form-control" id="ActiveStatus" name="ActiveStatus" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@endsection
