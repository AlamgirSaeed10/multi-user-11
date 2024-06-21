@extends('includes.menu')

@section('content')
<div class="container">
    <h1>{{ $notice->title }}</h1>
    <p>{{ $notice->content }}</p>
    <p>Expiry Date: {{ $notice->expiry_date }}</p>
    <a href="{{ route('notices.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
