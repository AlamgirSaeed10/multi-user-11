@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Edit Office Timing</h1>
    <form action="{{ route('office-timings.update', $officeTiming->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="shift">Shift</label>
            <input type="text" name="shift" class="form-control" value="{{ $officeTiming->shift }}" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $officeTiming->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $officeTiming->end_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
