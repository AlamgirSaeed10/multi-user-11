@extends('includes.menu')

@section('content')
    <h1 class="mb-4">Employee Details</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                @if ($employee->EmployeeImage)
                    <img src="{{ asset('/' . $employee->EmployeeImage) }}" alt="Employee Image"
                        class="img-fluid rounded-circle mt-3 mx-auto" style="width: 150px; height: 150px;">
                @else
                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Default Employee Image"
                        class="img-fluid rounded-circle mt-3 mx-auto" style="width: 150px; height: 150px;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $employee->FirstName }} {{ $employee->LastName }}</h5>
                    <p class="card-text">Employee Code: {{ $employee->EmployeeCode }}</p>
                    <p class="card-text">{{ $employee->Designation }} - {{ $employee->Department }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <strong>Employee Information</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="employeeTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="personal-info-tab" data-toggle="pill" href="#personal-info"
                                role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="bank-info-tab" data-toggle="pill" href="#bank-info" role="tab"
                                aria-controls="bank-info" aria-selected="false">Bank Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="emergency-detail-tab" data-toggle="pill" href="#emergency-detail"
                                role="tab" aria-controls="emergency-detail" aria-selected="false">Emergency Detail</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="employeeTabContent">
                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel"
                            aria-labelledby="personal-info-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Employee Role</th>
                                        <td>
                                            {{ $employee->EmployeeCode == 1 ? 'Super Admin' : ($employee->EmployeeCode == 2 ? 'Manager' : ($employee->EmployeeCode == 3 ? 'Client' : 'Employee')) }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Employee Code</th>
                                        <td>{{ $employee->EmployeeCode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{ $employee->DateOfBirth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Father's Name</th>
                                        <td>{{ $employee->FatherName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number</th>
                                        <td>{{ $employee->ContactNo }}</td>
                                    </tr>
                                    <tr>
                                        <th>CNIC</th>
                                        <td>{{ $employee->CNIC }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $employee->Gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $employee->Email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Qualification</th>
                                        <td>{{ $employee->Qualification }}</td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status</th>
                                        <td>{{ $employee->MaterialStatus }}</td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td>{{ $employee->Department }}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{ $employee->Designation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shift</th>
                                        <td>{{ $employee->Shift }}</td>
                                    </tr>
                                    <tr>
                                        <th>Joining Date</th>
                                        <td>{{ $employee->JoiningDate }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $employee->Address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Active Status</th>
                                        <td>{{ $employee->ActiveStatus ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="bank-info" role="tabpanel" aria-labelledby="bank-info-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>{{ $employee->BankName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank IBAN</th>
                                        <td>{{ $employee->BankIBAN }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Holder Name</th>
                                        <td>{{ $employee->AccHolderName }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="emergency-detail" role="tabpanel"
                            aria-labelledby="emergency-detail-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Emergency Contact Name</th>
                                        <td>{{ $employee->EmergencyContactName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Emergency Contact Relation</th>
                                        <td>{{ $employee->EmergencyContactRelation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Emergency Contact Number</th>
                                        <td>{{ $employee->EmergencyContactNo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Emergency Contact Address</th>
                                        <td>{{ $employee->EmergencyContactAddress }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
@endsection
