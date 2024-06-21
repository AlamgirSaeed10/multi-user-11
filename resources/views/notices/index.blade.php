@extends('includes.menu')
@section('content')
<div class="container">
    <h1>Notices</h1>
    <a href="{{ route('notices.create') }}" class="btn btn-primary">Create Notice</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Expiry Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices as $notice)
                <tr>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->content }}</td>
                    <td>{{ $notice->expiry_date }}</td>
                    <td>
                        <a href="{{ route('notices.show', $notice->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" style="display:inline;">
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
