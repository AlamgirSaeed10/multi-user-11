@extends('includes.menu')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_name">Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ $customer->customer_name }}" required>
            </div>
            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" name="business_name" class="form-control" value="{{ $customer->business_name }}">
            </div>
            <div class="form-group">
                <label for="website_link">Website Link</label>
                <input type="text" name="website_link" class="form-control" value="{{ $customer->website_link }}">
            </div>
            <div class="form-group">
                <label for="customer_email">Email</label>
                <input type="email" name="customer_email" class="form-control" value="{{ $customer->customer_email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="customer_phone">Phone</label>
                <input type="text" name="customer_phone" class="form-control" value="{{ $customer->customer_phone }}"
                    required>
            </div>
            <div class="form-group">
                <label for="customer_city">City</label>
                <input type="text" name="customer_city" class="form-control" value="{{ $customer->customer_city }}"
                    required>
            </div>
            <div class="form-group">
                <label for="customer_address">Address</label>
                <input type="text" name="customer_address" class="form-control" value="{{ $customer->customer_address }}"
                    required>
            </div>
            <div class="form-group">
                <label for="customer_postcode">Postcode</label>
                <input type="text" name="customer_postcode" class="form-control"
                    value="{{ $customer->customer_postcode }}" required>
            </div>
            <div class="form-group">
                <label for="customer_task">Task</label>
                <input type="text" name="customer_task" class="form-control" value="{{ $customer->customer_task }}"
                    required>
            </div>
            <div class="form-group">
                <label for="task_description">Task Description</label>
                <textarea name="task_description" class="form-control" rows="3" required>{{ $customer->task_description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
