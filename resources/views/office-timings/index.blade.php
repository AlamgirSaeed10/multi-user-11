@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Office Timings</h1>
    <a href="{{ route('office-timings.create') }}" class="btn btn-primary">Add Office Timing</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Shift</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($officeTimings as $officeTiming)
            <tr>
                <td>{{ $officeTiming->id }}</td>
                <td>{{ $officeTiming->shift }}</td>
                <td>{{ $officeTiming->start_time }}</td>
                <td>{{ $officeTiming->end_time }}</td>
                <td>
                    <a href="{{ route('office-timings.show', $officeTiming->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('office-timings.edit', $officeTiming->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('office-timings.destroy', $officeTiming->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
