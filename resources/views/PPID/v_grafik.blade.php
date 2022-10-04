@extends('App.master')
@section('title')
    Data Grafik
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Grafik Kunjungan Tamu</h4>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Kunjungan Hari ini</p>
                                    <h4 class="card-title">{{ $count_tamu_today }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="far fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Kunjungan minggu ini</p>
                                    <h4 class="card-title">{{ $count_tamu_week }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Kunjungan bulan ini</p>
                                    <h4 class="card-title">{{ $count_tamu_month }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Kunjungan keseluruhan</p>
                                    <h4 class="card-title">{{ $count_all_tamu }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><center>Grafik Kunjungan</center></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><center>Grafik Pelayanan</center></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart_2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><center>Tingkat</center></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('cdn/chart.js') }}"></script>
<script>
    const ctx = document.getElementById('barChart');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Hari ini', 'Minggu ini', 'Bulan ini', 'Keseluruhan'],
            datasets: [{
                label: 'Data Kunjungan',
                data: [{{ $count_tamu_today }}, {{ $count_tamu_week }}, {{ $count_tamu_month }}, {{ $count_all_tamu }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx_2 = document.getElementById('barChart_2');
    const barChart_2 = new Chart(ctx_2, {
        type: 'bar',
        data: {
            labels: ['Bulan 1-4', 'Bulan 5-8', 'Bulan 9-12'],
            datasets: [{
                label: 'Tercapai',
                data: [{{ $tercapai_month_1_until_4 }}, {{ $tercapai_month_5_until_8 }}, {{ $tercapai_month_9_until_12 }}],
                backgroundColor: [
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Tidak Tercapai',
                data: [{{ $tidak_tercapai_month_1_until_4 }}, {{ $tidak_tercapai_month_5_until_8 }}, {{ $tidak_tercapai_month_9_until_12 }}],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            },
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx_3 = document.getElementById('pieChart');
    const pieChart = new Chart(ctx_3, {
        type: 'pie',
        data: {
            labels: ['Puas', 'Tidak Puas'],
            datasets: [{
                label: 'Data Kunjungan',
                data: [{{ $puas }}, {{ $tidak_puas }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
@endsection