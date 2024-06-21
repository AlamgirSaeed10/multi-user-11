@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Expense Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $expense->description }}</h5>
            <p class="card-text"><strong>Amount:</strong> {{ $expense->amount }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $expense->expense_date }}</p>
            <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back to Expenses</a>
        </div>
    </div>
</div>
@endsection
