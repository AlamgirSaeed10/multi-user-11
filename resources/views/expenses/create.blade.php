@extends('includes.menu')

@section('content')
    <div class="container">
        <h1>Add Expense</h1>
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="expense_name">Expense Name</label>
                <input type="text" name="expense_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expense_date">Date</label>
                <input type="date" name="expense_date" class="form-control" required> <!-- Added this input -->
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Expense</button>
        </form>
    </div>
@endsection
