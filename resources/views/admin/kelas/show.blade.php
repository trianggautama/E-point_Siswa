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
                <h4 class="mg-b-0 tx-spacing--1">Data Siswa Kelas {{$data->kelas}}</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-10">
                <div class="card card-body ">
                    <div data-label="Example" class="df-example demo-table">
                        <table id="dataTable" class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->NIS}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->kelas_siswa->last()->kelas->kelas}}</td>
                                    <td>{{$d->tempat_lahir}}, {{$d->tanggal_lahir}}</td>
                                    <td><p class="text-success">{{$d->point}}</p></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- df-example -->
                </div>
            </div>
        <div class="col-md-12 mg-t-10">
        <div class="card">
            <div class="card-header">
            Rincian Data Prestasi
            </div>
            <div class="card-body">
                <canvas id="prestasiChart" width="200" height="50"></canvas>
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
<script>
    $(function () {
        'use strict'

        $('#dataTable').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });

    function Hapus(uuid, nama) {
        Swal.fire({
            title: 'Anda Yakin?',
            text: " Menghapus data Siswa  '" + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                url = '{{route("siswaDestroy",'')}}';
                window.location.href = url + '/' + uuid;
            }
        })
    }

     // grafik perkelas
     var ctx = document.getElementById('prestasiChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels: {!! $nama !!},
        datasets: [{
            label: 'Data Prestasi',
            data: {!! $prestasi !!},
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

 // grafik perkelas
 var ctx = document.getElementById('pelanggaranChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels: {!! $nama !!},
        datasets: [{
            label: 'Data Pelanggaran',
            data: {!! $pelanggaran !!},
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
