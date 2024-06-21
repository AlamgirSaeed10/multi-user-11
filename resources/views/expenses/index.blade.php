@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Expenses</h1>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add Expense</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->expense_date }}</td>
                    <td>
                        <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
