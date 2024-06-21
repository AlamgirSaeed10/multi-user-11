@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Create Office Timing</h1>
    <form action="{{ route('office-timings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="shift">Shift</label>
            <input type="text" name="shift" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
