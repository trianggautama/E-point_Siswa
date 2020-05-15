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
                <button class="btn btn-sm pd-x-15 btn-secondary btn-uppercase mg-l-5"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Print</button>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
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
                            <p class="mg-b-0">{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success mg-10" role="alert">
                            <h4 class="alert-heading">Poin Siswa</h4>
                            <p>{{$data->point}}</p>
                            <div class="text-right">
                                <a href="" class="btn btn-success"> Detail Transaksi Point </a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
              <div class="card mg-t-10">
                <div class="card-header">
                    Data Wali Siswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama Siswa</label>
                                <p class="mg-b-0">Kelas {{$data->wali_siswa->nama}}</p>
                            </div>
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor HP</label>
                                <p class="mg-b-0">Kelas {{$data->wali_siswa->no_hp}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Alamat</label>
                                <p class="mg-b-0">Kelas {{$data->wali_siswa->alamat}}</p>
                            </div>
                            <div class="form-group">
                                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Status Wali</label>
                                @if($data->wali_siswa = 1)
                                    <p class="mg-b-0">Ayah</p>
                                @elseif($data->wali_siswa = 2)
                                    <p class="mg-b-0">Ibu</p>
                                @elseif($data->wali_siswa = 3)
                                    <p class="mg-b-0">Kakak</p>
                                @else
                                    <p class="mg-b-0">Kerabat Orang Tua</p>
                                @endif
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
