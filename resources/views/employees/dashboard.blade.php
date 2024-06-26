@extends('includes.emp-menu')

@section('content')

    @php
        $attendances = \App\Models\Attendance::where('employee_id', Auth::id())->get();
    @endphp

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Dashboard</h1>
        </div>

        <div class="row">
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-2 pb-2 text-center">
                            @if (
                                !$attendances->contains('date', now()->toDateString()) ||
                                    (now()->diffInMinutes(now()->setTime(15, 0)) <= 5 &&
                                        !$attendances->where('date', now()->toDateString())->first()->out_time))
                                <form action="{{ route('attendance.mark') }}" method="POST">
                                    @csrf
                                    <button style="width: 120px; height:120px;" type="submit"
                                        class="btn btn-success btn-circle btn-lg">
                                        <i class="fas fa-clock" style="font-size: 50px;"></i>
                                    </button>
                                </form>
                            @endif


                            <h5 class="font-weight-bolder mt-4" id="date"></h5>
                            <p class="display-4 font-weight-bolder" id="time"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div id="attendance-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/updateTime.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                url: '{{ route('api.attendances') }}',
                method: 'GET',
                success: function(data) {
                    const attendanceData = {
                        Present: 0,
                        Absent: 0,
                        Leave: 0
                    };

                    data.forEach(attendance => {
                        attendanceData[attendance.status]++;
                    });

                    Highcharts.chart('attendance-chart', {
                        chart: {
                            type: 'line'
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Employee Attendance'
                        },
                        xAxis: {
                            categories: ['Present', 'Absent', 'Leave'],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Days'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y}</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Days',
                            data: [attendanceData.Present, attendanceData.Absent,
                                attendanceData.Leave
                            ]
                        }]
                    });
                }
            });
        });
    </script>
@endsection
