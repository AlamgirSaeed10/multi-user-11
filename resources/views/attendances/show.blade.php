<!-- resources/views/attendances/month.blade.php -->

@extends('includes.menu')

@section('content')
    <div class="container mt-4">
        <h1>Attendance for {{ $employee->FirstName }} {{ $employee->LastName }} - {{ $year }} / {{ str_pad($month, 2, '0', STR_PAD_LEFT) }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    $attendanceMap = $attendances->keyBy('date');
                @endphp
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                        $attendance = $attendanceMap->get($date);
                    @endphp
                    <tr>
                        <td>{{ $date }}</td>
                        <td>
                            @if ($attendance)
                                {{ $attendance->status }}
                            @else
                                X
                            @endif
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
