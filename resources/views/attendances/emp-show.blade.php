@extends('includes.emp-menu')

@section('content')

<h1>Attendance for {{ $employee->FirstName }} {{ $employee->LastName }}</h1>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Month</th>
                @for ($i = 1; $i <= 31; $i++)
                    <th>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @php
                $months = [
                    'January' => 31, 'February' => 28, 'March' => 31,
                    'April' => 30, 'May' => 31, 'June' => 30,
                    'July' => 31, 'August' => 31, 'September' => 30,
                    'October' => 31, 'November' => 30, 'December' => 31
                ];

                // Marking Sundays
                function isSunday($date) {
                    return \Carbon\Carbon::parse($date)->dayOfWeek == \Carbon\Carbon::SUNDAY;
                }

                $attendanceData = collect($attendances)->groupBy(function ($attendance) {
                    return \Carbon\Carbon::parse($attendance->date)->format('Y-m');
                });
            @endphp

            @foreach ($months as $month => $days)
                @php
                    $monthIndex = array_search($month, array_keys($months)) + 1;
                    $currentYearMonth = now()->year . '-' . str_pad($monthIndex, 2, '0', STR_PAD_LEFT);
                    $currentMonthData = $attendanceData->get($currentYearMonth, collect());
                @endphp
                <tr>
                    <td>{{ $month }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        @if ($day > $days)
                            <td colspan="{{ 31 - $days }}" rowspan="1"></td>
                            @break
                        @endif

                        @php
                            $dateString = "$currentYearMonth-" . str_pad($day, 2, '0', STR_PAD_LEFT);
                            $attendance = $currentMonthData->firstWhere('date', $dateString);
                            $isSunday = isSunday($dateString);
                        @endphp

                        <td class="{{ $isSunday ? 'bg-secondary text-white' : '' }}">
                            @if ($attendance)
                                <span class="badge badge-{{ $attendance->status == 'Present' ? 'success' : ($attendance->status == 'Absent' ? 'danger' : 'warning') }}">
                                    {{ $attendance->status[0] }}
                                </span>
                            @else
                                -
                            @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
