@extends('includes.menu')

@section('content')
<div class="container">
    <h1>Office Timing Details</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $officeTiming->shift }}</h2>
        </div>
        <div class="card-body">
            <p>Start Time: {{ $officeTiming->start_time }}</p>
            <p>End Time: {{ $officeTiming->end_time }}</p>
        </div>
    </div>
    <a href="{{ route('office-timings.index') }}" class="btn btn-primary mt-3">Back to List</a>
</div>
@endsection
