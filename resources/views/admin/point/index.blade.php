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
                <h4 class="mg-b-0 tx-spacing--1">Data point Siswa</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="{{Route('poinFilterKelas')}}" class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Filter Kelas</a>
                <a href="{{Route('poinCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer"
                        class="wd-10 mg-r-5" target="_blank"></i> Print</a>
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
                                    <th>point</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->NIS}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->kelas_siswa->last()->kelas->kelas}}</td>
                                    <td>{{$d->point}}</td>
                                    <td>
                                    <a href="{{Route('pointShow',['uuid'=>$d->uuid])}}"
                                            class="btn btn-warning btn-icon">
                                            <i data-feather="info"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- df-example -->
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

</script>
@endsection