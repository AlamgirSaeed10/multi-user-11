@extends('includes.menu')

@section('content')

@php
     $attendances = DB::table('attendances')->where('user_id', Auth::id())->get();
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
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">


                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-2 pb-2 text-center">
                            @if (
                                !$attendances->contains('date', now()->toDateString()) ||
                                    (now()->diffInMinutes(now()->setTime(3, 0)) <= 5 &&
                                        !$attendances->where('date', now()->toDateString())->first()->out_time))
                                <form action="{{ route('attendance.mark') }}" method="POST">
                                    @csrf
                                    <button style="width: 120px;height:120px" type="submit"
                                        class="btn btn-success btn-circle btn-lg"><i class="fas fa-clock"
                                            style="font-size: 50px"></i></button>
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
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myAreaChart" width="824" height="320"
                                style="display: block; width: 824px; height: 320px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/updateTime.js') }}"></script>
@endsection
