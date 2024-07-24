@extends('includes.menu')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manager Dashboard</h1>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Chart</h6>
                </div>
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
                            style="display: block; width: 824px; height: 320px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Engagement Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="379" height="253"
                            style="display: block; width: 379px; height: 253px;" class="chartjs-render-monitor"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
