@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Siswa</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Detail Siswa</h4>
            </div>
            <div class="d-none d-md-block">
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">

              <div class="row">
                <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                    Detail Siswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama Siswa</label>
                                <p class="mg-b-0">{{$data->nama}}</p>
                            </div>
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor Induk Siswa</label>
                                <p class="mg-b-0">{{$data->NIS}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Kelas</label>
                            <p class="mg-b-0">Kelas {{$data->kelas->kelas}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Tempat, Tanggal lahir</label>
                            <p class="mg-b-0">{{$data->tempat_lahir}}, {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}} </p>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Poin Siswa : {{$data->point}}</h4>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <!-- grafik -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Grafik Prestasi dan Pelanggaran
                            </div>
                            <div class="col-md-6">
                            <div class="text-right">
                                <a href="{{Route('prestasiSiswaCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
                                class="wd-10 mg-r-5"></i>   prstasi dan pelanggaran</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                </div>

               
        </div><!-- row -->
    </div><!-- container -->
</div>

@endsection
@section('scripts')
<script>
    $(function () {
        'use strict'

        $('.table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });

    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Prestasi', 
          'Pelanggaran', 
      ],
      datasets: [
        {
          data: [{{$data->prestasi->count()}},{{$data->pelanggaran->count()}}],
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
</script>
@endsection
