@extends('includes.menu')

@section('content')

    <h4 class="mb-4 font-weight-bold text-dark">Customer Details</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $customer->customer_name }}</h5>
                    <p class="card-text">Business Name: {{ $customer->business_name }}</p>
                    <p class="card-text">City: {{ $customer->customer_city }}</p>
                    <p class="card-text">Phone: {{ $customer->customer_phone }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <strong>Customer Information</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="customerTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-info-tab" data-toggle="pill" href="#contact-info" role="tab" aria-controls="contact-info" aria-selected="false">Contact Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="task-info-tab" data-toggle="pill" href="#task-info" role="tab" aria-controls="task-info" aria-selected="false">Task Info</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="customerTabContent">
                        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr><th>Business Name</th><td>{{ $customer->business_name }}</td></tr>
                                    <tr><th>Website Link</th><td><a href="{{ $customer->website_link }}" target="_blank">{{ $customer->website_link }}</a></td></tr>
                                    <tr><th>City</th><td>{{ $customer->customer_city }}</td></tr>
                                    <tr><th>Address</th><td>{{ $customer->customer_address }}</td></tr>
                                    <tr><th>Postcode</th><td>{{ $customer->customer_postcode }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr><th>Email</th><td>{{ $customer->customer_email }}</td></tr>
                                    <tr><th>Phone</th><td>{{ $customer->customer_phone }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="task-info" role="tabpanel" aria-labelledby="task-info-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr><th>Task</th><td>{{ $customer->customer_task }}</td></tr>
                                    <tr><th>Task Description</th><td>{{ $customer->task_description }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>

@endsection
