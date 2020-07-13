@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Selamat Datang di beranda Admin</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="/" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="home"
                        class="wd-10 mg-r-5"></i>Halaman Depan</a>
            </div>
        </div>

        <div class="row row-xs">

            <div class="col-md-4 col-lg-4 col-xl-4 mg-t-10 mg-t-5">
            <div class="card">
              <div class="card-header">
                <h6 class="mg-b-0">Grafik Pelanggaran dan prestasi</h6>
              </div><!-- card-header -->
              <div class="card-body pd-lg-25">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div>
          <div class="col-md-8 col-lg-8 col-xl-8 mg-t-10 mg-t-5">
              <div class="row">
                  <div class="col-md-6 ">
                  <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Siswa</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$siswa->count()}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">Siswa </span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart3" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
                  </div>
                  <div class="col-md-6 ">
                  <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Panduan Peraturan</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$pedoman->count()}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">Peraturan</span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart4" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
                  </div>
                  <div class="col-md-6 mg-t-10">
                  <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">pelanggaran Siswa</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$pelanggaran->count()}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">kasus</span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart5" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
                  </div>
                  <div class="col-md-6 mg-t-10">
                  <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Prestasi Siswa</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$prestasi->count()}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">kasus</span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart6" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
                  </div>
                <div class="col-md-12 col-xl-12 mg-t-10">
                <div class="card card-body ht-lg-100">
                    <div class="media">
                        <span class="tx-color-04"><i data-feather="info" class="wd-60 ht-60"></i></span>
                        <div class="media-body mg-l-20">
                            <h6 class="mg-b-10">Selamat Datang</h6>
                            <p class="tx-color-03 mg-b-0">Selamat Datang Admin</p>
                        </div>
                    </div><!-- media -->
                </div>
            </div>
              </div>
          </div>
        <div class="col-md-12 mg-t-10">
        <div class="card">
            <div class="card-header">
                Rincian Data Prestasi
            </div>
            <div class="card-body">
                <canvas id="myChart" width="200" height="50"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-12 mg-t-10">
        <div class="card">
            <div class="card-header">
            Rincian Data Pelanggaran
            </div>
            <div class="card-body">
                <canvas id="pelanggaranChart" width="200" height="50"></canvas>
            </div>
          </div>
        </div>
        </div><!-- row -->
        
    </div><!-- container -->
</div>
@endsection
@section('scripts')
<script> //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Prestasi', 
          'Pelanggaran', 
      ],
      datasets: [
        {
          data: [{{$prestasi->count()}},{{$pelanggaran->count()}}],
          backgroundColor : [ '#57aefa', '#7b47ff'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })

    // grafik prestasi
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels: {!! $labelPrestasi !!},
        datasets: [{
            label: 'Data Prestasi',
            data: {!! $pedomanPrestasi !!},
            backgroundColor: '#57aefa' ,
            borderColor: '#4287f5',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    // grafik pelanggaran
    var ctx = document.getElementById('pelanggaranChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels: {!! $labelPelanggaran !!},
        datasets: [{
            label: 'Data Pelanggaran',
            data: {!! $pedomanPelanggaran !!},
            backgroundColor: '#7b47ff' ,
            borderColor: '#4f1bd1',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
