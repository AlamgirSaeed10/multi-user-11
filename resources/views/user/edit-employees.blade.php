@extends('includes.menu')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-gray-800">Update Employees</h5>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('update.employees',$single_emp->EmployeeCode) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->FirstName }}" id="FirstName"
                                name="FirstName" placeholder="Enter first name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->LastName }}" id="LastName"
                                name="LastName" placeholder="Enter last name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="DateOfBirth">Date of Birth</label>
                            <input type="date" class="form-control" value="{{ $single_emp->DateOfBirth }}"
                                id="DateOfBirth" name="DateOfBirth" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="FatherName">Father's Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->FatherName }}" id="FatherName"
                                name="FatherName" placeholder="Enter father's name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Gender">Gender</label>
                            <select class="form-control" value="{{ $single_emp->Gender }}" id="Gender" name="Gender"
                                required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="ContactNo">Contact Number</label>
                            <input type="tel" class="form-control" value="{{ $single_emp->ContactNo }}" id="ContactNo"
                                name="ContactNo" placeholder="Enter contact number (03xxxxxxxxx)" pattern="03\d{9}" required
                                maxlength="11">
                            <small id="contactNoHelp" class="form-text text-muted">Format: 03xxxxxxxxx</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="CNIC">CNIC</label>
                            <input type="text" class="form-control" value="{{ $single_emp->CNIC }}" id="CNIC"
                                name="CNIC" placeholder="Enter CNIC number (xxxxx-xxxxxxx-x)" pattern="\d{5}-\d{7}-\d"
                                required maxlength="15">
                            <small id="cnicHelp" class="form-text text-muted">Format: xxxxx-xxxxxxx-x</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" value="{{ $single_emp->Email }}" id="Email"
                                name="Email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Qualification">Qualification</label>
                            <select class="form-control" id="Qualification" name="Qualification" required>
                                <option value="">Select Qualification</option>
                                <option value="Matric" {{ $single_emp->Qualification == 'Matric' ? 'selected' : '' }}>
                                    Matric</option>
                                <option value="A/O Level"
                                    {{ $single_emp->Qualification == 'A/O Level' ? 'selected' : '' }}>A/O Level</option>
                                <option value="Intermediate"
                                    {{ $single_emp->Qualification == 'Intermediate' ? 'selected' : '' }}>Intermediate
                                </option>
                                <option value="Bachelor" {{ $single_emp->Qualification == 'Bachelor' ? 'selected' : '' }}>
                                    Bachelor</option>
                                <option value="Masters" {{ $single_emp->Qualification == 'Masters' ? 'selected' : '' }}>
                                    Masters</option>
                                <option value="PhD" {{ $single_emp->Qualification == 'PhD' ? 'selected' : '' }}>PhD
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="MaterialStatus">Marital Status</label>
                            <select class="form-control" value="{{ $single_emp->MaterialStatus }}" id="MaterialStatus"
                                name="MaterialStatus" required>
                                <option value="">Select Marital Status</option>
                                <option value="Single" {{ $single_emp->MaterialStatus == 'Single' ? 'selected' : '' }}>
                                    Single
                                </option>
                                <option value="Married" {{ $single_emp->MaterialStatus == 'Married' ? 'selected' : '' }}>
                                    Married
                                </option>
                                <option value="Divorced"
                                    {{ $single_emp->MaterialStatus == 'Divorced' ? 'selected' : '' }}>Divorced
                                </option>
                                <option value="Widowed" {{ $single_emp->MaterialStatus == 'Widowed' ? 'selected' : '' }}>
                                    Widowed
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Department">Department</label>
                            <input type="text" class="form-control" value="{{ $single_emp->Department }}"
                                id="Department" name="Department" placeholder="Enter department" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Designation">Designation</label>
                            <input type="text" class="form-control" value="{{ $single_emp->Designation }}"
                                id="Designation" name="Designation" placeholder="Enter designation" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Shift">Shift</label>
                            <input type="text" class="form-control" value="{{ $single_emp->Shift }}" id="Shift"
                                name="Shift" placeholder="Enter shift" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="JoiningDate">Joining Date</label>
                            <input type="date" class="form-control" value="{{ $single_emp->JoiningDate }}"
                                id="JoiningDate" name="JoiningDate" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" value="{{ $single_emp->Address }}"
                                id="Address" name="Address" placeholder="Enter address" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="EmergencyContactName">Emergency Contact Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->EmergencyContactName }}"
                                id="EmergencyContactName" name="EmergencyContactName"
                                placeholder="Enter emergency contact name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="EmergencyContactRelation">Emergency Contact Relation</label>
                            <input type="text" class="form-control"
                                value="{{ $single_emp->EmergencyContactRelation }}" id="EmergencyContactRelation"
                                name="EmergencyContactRelation" placeholder="Enter emergency contact relation" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="EmergencyContactNo">Emergency Contact Number</label>
                            <input type="text" class="form-control" value="{{ $single_emp->EmergencyContactNo }}"
                                id="EmergencyContactNo" name="EmergencyContactNo"
                                placeholder="Enter emergency contact number" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="EmergencyContactAddress">Emergency Contact Address</label>
                            <input type="text" class="form-control"
                                value="{{ $single_emp->EmergencyContactAddress }}" id="EmergencyContactAddress"
                                name="EmergencyContactAddress" placeholder="Enter emergency contact address" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="BankName">Bank Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->BankName }}"
                                id="BankName" name="BankName" placeholder="Enter bank name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="BankIBAN">Bank IBAN</label>
                            <input type="text" class="form-control" value="{{ $single_emp->BankIBAN }}"
                                id="BankIBAN" name="BankIBAN" placeholder="Enter bank IBAN" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="AccHolderName">Account Holder Name</label>
                            <input type="text" class="form-control" value="{{ $single_emp->AccHolderName }}"
                                id="AccHolderName" name="AccHolderName" placeholder="Enter account holder name" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="EmployeeImage">Employee Image</label>
                            <input type="file" class="form-control-file" id="EmployeeImage" name="EmployeeImage">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="form-group">
                            <label for="ActiveStatus">Active Status</label>
                            <select class="form-control" value="{{ $single_emp->ActiveStatus }}" id="ActiveStatus"
                                name="ActiveStatus" required>
                                <option value="1"{{ $single_emp->ActiveStatus == '1' ? 'selected' : '' }}>Active
                                </option>
                                <option value="0"{{ $single_emp->ActiveStatus == '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
    </div>
@endsection
