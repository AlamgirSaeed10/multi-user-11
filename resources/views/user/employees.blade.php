@extends('includes.menu')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-gray-800">Manage Employees</h5>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#employeeModal">
            <i class="fas fa-user-plus fa-sm text-white-50"></i> Add Employee
        </button>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @if (count($emp_list) > 0)
            @foreach ($emp_list as $key => $value)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
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
                                    <strong>Joining</strong> {{ date('d-m-Y', strtotime($value->JoiningDate)) }}
                                    <span></span>
                                </div>
                                <div class="ends">
                                    <strong>Leaving</strong> -
                                </div>
                            </div>
                            <div class="stats mb-2">
                                <div>
                                    <strong>PRESENT</strong> 3098
                                </div>
                                <div>
                                    <strong>ABSENT</strong> 562
                                </div>
                                <div>
                                    <strong>LEAVES</strong> 182
                                </div>
                            </div>
                            <div class="footer text-center">

                                <a href="{{ route('view.employees', $value->EmployeeCode) }}" data-toggle="modal"
                                    data-target="#view_employeeModal" data-employee-code="{{ $value->EmployeeCode }}"
                                    class="btn btn-primary btn-icon-split btn-sm viewEmployee">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">View</span>
                                </a>

                                <a href="{{ route('edit.employees', $value->EmployeeCode) }}"
                                    class="btn btn-warning btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>


                                <a class="btn btn-danger btn-icon-split btn-sm"
                                    href="{{ route('delete.employees', $value->EmployeeCode) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-emp').submit();">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                </a>

                                <form id="delete-emp" action="{{ route('delete.employees', $value->EmployeeCode) }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container-fluid">

                <h5 class="text-center text-danger">No Employee Found...!</h5>
            </div>
        @endif
    </div>
















    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('store.employees') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="EmployeeCode">Employee Code</label>
                            <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode"
                                placeholder="Enter employee code" required>
                        </div>
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName"
                                placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" id="LastName" name="LastName"
                                placeholder="Enter last name" required>
                        </div>
                        <div class="form-group">
                            <label for="DateOfBirth">Date of Birth</label>
                            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
                        </div>
                        <div class="form-group">
                            <label for="FatherName">Father's Name</label>
                            <input type="text" class="form-control" id="FatherName" name="FatherName"
                                placeholder="Enter father's name" required>
                        </div>
                        <div class="form-group">
                            <label for="ContactNo">Contact Number</label>
                            <input type="tel" class="form-control" id="ContactNo" name="ContactNo"
                                placeholder="Enter contact number (03xxxxxxxxx)" pattern="03\d{9}" required
                                maxlength="11">
                            <small id="contactNoHelp" class="form-text text-muted">Format: 03xxxxxxxxx</small>
                        </div>
                        <div class="form-group">
                            <label for="CNIC">CNIC</label>
                            <input type="text" class="form-control" id="CNIC" name="CNIC"
                                placeholder="Enter CNIC number (xxxxx-xxxxxxx-x)" pattern="\d{5}-\d{7}-\d" required
                                maxlength="15">
                            <small id="cnicHelp" class="form-text text-muted">Format: xxxxx-xxxxxxx-x</small>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender</label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" name="Email"
                                placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="Qualification">Qualification</label>
                            <select class="form-control" id="Qualification" name="Qualification" required>
                                <option value="">Select Qualification</option>
                                <option value="Matric">Matric</option>
                                <option value="A/O Level">A/O Level</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Bachelors">Bachelors</option>
                                <option value="Masters">Masters</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="MaterialStatus">Marital Status</label>
                            <select class="form-control" id="MaterialStatus" name="MaterialStatus" required>
                                <option value="">Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Department">Department</label>
                            <input type="text" class="form-control" id="Department" name="Department"
                                placeholder="Enter department" required>
                        </div>
                        <div class="form-group">
                            <label for="Designation">Designation</label>
                            <input type="text" class="form-control" id="Designation" name="Designation"
                                placeholder="Enter designation" required>
                        </div>
                        <div class="form-group">
                            <label for="Shift">Shift</label>
                            <input type="text" class="form-control" id="Shift" name="Shift"
                                placeholder="Enter shift" required>
                        </div>
                        <div class="form-group">
                            <label for="JoiningDate">Joining Date</label>
                            <input type="date" class="form-control" id="JoiningDate" name="JoiningDate" required>
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" name="Address"
                                placeholder="Enter address" required>
                        </div>
                        <div class="form-group">
                            <label for="EmergencyContactName">Emergency Contact Name</label>
                            <input type="text" class="form-control" id="EmergencyContactName"
                                name="EmergencyContactName" placeholder="Enter emergency contact name" required>
                        </div>
                        <div class="form-group">
                            <label for="EmergencyContactRelation">Emergency Contact Relation</label>
                            <input type="text" class="form-control" id="EmergencyContactRelation"
                                name="EmergencyContactRelation" placeholder="Enter emergency contact relation" required>
                        </div>
                        <div class="form-group">
                            <label for="EmergencyContactNo">Emergency Contact Number</label>
                            <input type="text" class="form-control" id="EmergencyContactNo" name="EmergencyContactNo"
                                placeholder="Enter emergency contact number" required>
                        </div>
                        <div class="form-group">
                            <label for="EmergencyContactAddress">Emergency Contact Address</label>
                            <input type="text" class="form-control" id="EmergencyContactAddress"
                                name="EmergencyContactAddress" placeholder="Enter emergency contact address" required>
                        </div>
                        <div class="form-group">
                            <label for="BankName">Bank Name</label>
                            <input type="text" class="form-control" id="BankName" name="BankName"
                                placeholder="Enter bank name" required>
                        </div>
                        <div class="form-group">
                            <label for="BankIBAN">Bank IBAN</label>
                            <input type="text" class="form-control" id="BankIBAN" name="BankIBAN"
                                placeholder="Enter bank IBAN" required>
                        </div>
                        <div class="form-group">
                            <label for="AccHolderName">Account Holder Name</label>
                            <input type="text" class="form-control" id="AccHolderName" name="AccHolderName"
                                placeholder="Enter account holder name" required>
                        </div>
                        <div class="form-group">
                            <label for="EmployeeImage">Employee Image</label>
                            <input type="file" class="form-control-file" id="EmployeeImage" name="EmployeeImage">
                        </div>
                        <div class="form-group">
                            <label for="ActiveStatus">Active Status</label>
                            <select class="form-control" id="ActiveStatus" name="ActiveStatus" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="view_employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <table class="table table-borderless table-lg">
                            <tbody>


                                <tr>
                                    <th class="text-capitalize">employee code:</th>
                                    <td id='employeeCode'></td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">email:</th>
                                    <td id='email'></td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">lastname:</th>
                                    <td id='lastName'></td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">date of birth:</th>
                                    <td id='dateOfBirth'> 854</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">father name:</th>
                                    <td id='fatherName'> 855</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.viewEmployee').click(function(e) {
                e.preventDefault();
                var employeeCode = $(this).data('employee-code');
                console.log("asd", employeeCode);
                $.ajax({
                    url: "{{ url('/view-employee') }}/" + employeeCode,
                    type: "GET",
                    data: {
                        emp_code: employeeCode
                    },
                    success: function(response) {
                        console.log("Response:", response);
                        if (response.success) {
                            var employee = response.data;
                            $('#employeeCode').text(employee.EmployeeCode);
                            $('#email').text(employee.Email);
                            $('#lastName').text(employee.LastName);
                            $('#dateOfBirth').text(employee.DateOfBirth);
                            $('#fatherName').text(employee.FatherName);
                            $('#view_employeeModal').modal('show');
                        } else {
                            console.log("Employee not found");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error);
                    }
                });
            });
        });
    </script>
@endsection
