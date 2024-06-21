@extends('includes.menu')

@section('content')
    <div class="container">
        <h1>Edit Expense</h1>
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="expense_name">Expense Name</label>
                <input type="text" name="expense_name" class="form-control" value="{{ $expense->expense_name }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="{{ $expense->amount }}" required>
            </div>
            <div class="form-group">
                <label for="expense_date">Date</label>
                <input type="date" name="expense_date" class="form-control" value="{{ $expense->expense_date }}" required> <!-- Added this input -->
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Expense</button>
        </form>
    </div>
@endsection
