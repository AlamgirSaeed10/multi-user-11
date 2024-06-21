
@extends('includes.menu')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Assigned To: {{ $task->user->name }}</p>
    <p>Start Date: {{ $task->start_date }}</p>
    <p>End Date: {{ $task->end_date }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
