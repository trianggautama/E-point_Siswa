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
                <h4 class="mg-b-0 tx-spacing--1">Detail Konsultasi Siswa</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="{{Route('konsultasiIndex')}}" class="btn btn-sm pd-x-15 btn-secondary btn-uppercase mg-l-5"><i data-feather="arrow-left"
                        class="wd-10 mg-r-5"></i> Kembali</a>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
              <div class="card">
                <div class="card-header">
                    Detail Konsultasi
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama Siswa</label>
                            <p class="mg-b-0">{{$data->siswa->nama}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor Induk Siswa</label>
                            <p class="mg-b-0">{{$data->siswa->NIS}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Kelas</label>
                            <p class="mg-b-0">Kelas {{$data->siswa->kelas->kelas}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Tanggal Konseling</label>
                            <p class="mg-b-0">{{$data->created_at->format('d-m-Y')}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama Guru</label>
                            <p class="mg-b-0">{{$data->pejabat->nama}}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Uraian</label>
                            <p class="mg-b-0 text-justify">{{$data->uraian}}</p>
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Saran</label>
                            <p class="mg-b-0 text-justify">...</p>
                        </div>
                    </div>
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

        $('#dataTable').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });

</script>
@endsection
