@extends('dashboard.components.auth')

@section('content')


<main class="main-content">

    <div class="content">
        <div class="widgets">
            <!-- Widget Total Seminars -->
            <div class="widget">
                <div class="widget-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="widget-content">
                    <h6 class="widget-title">Total Seminars</h6>
                    <p class="widget-value">{{ $totalSeminars }}</p>
                </div>
            </div>
            <!-- Widget Total Ticket Sales -->
            <div class="widget">
                <div class="widget-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="widget-content">
                    <h6 class="widget-title">Total Ticket Sales</h6>
                    <p class="widget-value">{{ $totalTicketSales }}</p>
                </div>
            </div>
            <!-- Widget Total Revenue -->
            <div class="widget">
                <div class="widget-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="widget-content">
                    <h6 class="widget-title">Total Revenue</h6>
                    <p class="widget-value">{{ 'Rp ' . number_format($totalRevenue, 2, ',', '.') }}</p>
                </div>
            </div>
            <!-- Widget User Count -->
            <div class="widget">
                <div class="widget-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="widget-content">
                    <h6 class="widget-title">User Count</h6>
                    <p class="widget-value">{{ $userCount }}</p>
                </div>
            </div>
        </div>

        <div class="charts mt-5">
            <!-- Diagram Batang (Bar Chart) -->
            <canvas id="seminarChart" class="chart"></canvas>

            <!-- Diagram Garis (Line Chart) -->
            <canvas id="revenueChart" class="chart"></canvas>

            <!-- Diagram Lingkaran (Pie Chart) -->
            <canvas id="pieChart" class="chart"></canvas>

            <!-- Diagram Area (Area Chart) -->
            <canvas id="areaChart" class="chart"></canvas>

            <!-- Diagram Donat (Donut Chart) -->
            <canvas id="donutChart" class="chart"></canvas>
        </div>
    </div>

</main>

<script id="seminarData" type="application/json">
    {!! json_encode($seminarData) !!}
</script>
<script id="revenueData" type="application/json">
    {!! json_encode($revenueData) !!}
</script>
<script id="revenueLabels" type="application/json">
    {!! json_encode($revenueLabels) !!}
</script>
<script id="categoryData" type="application/json">
    {!! json_encode($categoryData) !!}
</script>
<script id="cumulativeData" type="application/json">
    {!! json_encode($cumulativeData) !!}
</script>
<script id="cumulativeLabels" type="application/json">
    {!! json_encode($cumulativeLabels) !!}
</script>
<script id="seminarRevenueData" type="application/json">
    {!! json_encode($seminarRevenueData) !!}
</script>


<script src="{{ asset('assets/js/scripts.js') }}"></script>

@endsection