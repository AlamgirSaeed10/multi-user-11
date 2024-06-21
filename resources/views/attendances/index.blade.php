@extends('includes.menu')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Attendance List</h1>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">Add Attendance</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table id="attendanceTable" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Employee Code</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->employee_id }}</td>
                        <td>{{ $attendance->employee->FirstName }} {{ $attendance->employee->LastName }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->in_time }}</td>
                        <td>{{ $attendance->out_time }}</td>
                        <td>
                            @if($attendance->status == 'Present')
                                <span class="badge badge-success">{{ $attendance->status }}</span>
                            @elseif($attendance->status == 'Absent')
                                <span class="badge badge-danger">{{ $attendance->status }}</span>
                            @elseif($attendance->status == 'Leave')
                                <span class="badge badge-warning">{{ $attendance->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<script>
    $(document).ready(function() {
        $('#attendanceTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
