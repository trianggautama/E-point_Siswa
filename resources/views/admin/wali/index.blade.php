@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Wali Siswa</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Data Wali Siswa</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="{{Route('waliCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Cetak Data</a>
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
                                    <th>Nama Siswa</th>
                                    <th>Nama Wali</th>
                                    <th>Status Wali</th>
                                    <th>No Hp</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->siswa->NIS}}</td>
                                    <td>{{$d->siswa->nama}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td> 
                                         @if($data->status_wali = 1)
                                            <p class="mg-b-0">Ayah</p>
                                        @elseif($data->status_wali = 2)
                                            <p class="mg-b-0">Ibu</p>
                                        @elseif($data->status_wali = 3)
                                            <p class="mg-b-0">Kakak</p>
                                        @else
                                            <p class="mg-b-0">Kerabat Orang Tua</p>
                                        @endif
                                    </td>
                                    <td>{{$d->no_hp}}</td>
                                    <!-- <td>
                                        <a href="{{Route('siswaEdit',['uuid'=>$d->uuid])}}"
                                            class="btn btn-primary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                    </td> -->
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

</script>
@endsection
