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
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama
                                                Siswa</label>
                                            <p class="mg-b-0">{{$data->nama}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor
                                                Induk Siswa</label>
                                            <p class="mg-b-0">{{$data->NIS}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Kelas</label>
                                            <p class="mg-b-0">Kelas {{$data->kelas->kelas}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Tempat,
                                                Tanggal lahir</label>
                                            <p class="mg-b-0">{{$data->tempat_lahir}},
                                                {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right pl-3 mb-4">
                                    <a class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5" href="#modal2"
                                        data-toggle="modal"><i data-feather="plus" class="wd-10 mg-r-5"></i> tambah
                                        Data</a>
                                </div>
                                @foreach($kelas_siswa as $d)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Kelas</label>
                                            <p class="mg-b-0">{{$loop->iteration}}. Kelas {{$d->kelas->kelas}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Tahun
                                                Ajaran</label>
                                            <p class="mg-b-0">{{$d->tahun_ajaran->tahun_ajaran}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header">
                                Data Wali Siswa
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama
                                                Siswa</label>
                                            <p class="mg-b-0">Kelas {{$data->wali_siswa->nama}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor
                                                HP</label>
                                            <p class="mg-b-0">Kelas {{$data->wali_siswa->no_hp}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Alamat</label>
                                            <p class="mg-b-0">Kelas {{$data->wali_siswa->alamat}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Status
                                                Wali</label>
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
                                    <div class="col-md-12">
                                        <div class="alert alert-success" role="alert">
                                            <br>
                                            <h4 class="alert-heading">Poin Siswa : {{$data->point}}</h4>
                                            <br>
                                        </div>
                                    </div </div> </div> </div> </div> </div> <div class="card card-body mg-t-10">
                                    <h3>Pelanggaran Siswa</h3>
                                    <hr>
                                    <div data-label="Example" class="df-example demo-table">
                                        <table id="dataTable" class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Keterangan Pelanggaran</th>
                                                    <th>Pengurangan poin</th>
                                                    <th>Tanggal pelanggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pelanggaran as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->siswa->NIS}}</td>
                                                    <td>{{$d->siswa->nama}}</td>
                                                    <td>{{$d->pedoman->uraian}}</td>
                                                    <td>
                                                        <p class="text-danger">- {{$d->pedoman->bobot_point}} poin</p>
                                                    </td>
                                                    <td>{{$d->tanggal_pelanggaran}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!-- df-example -->
                                </div>
                                <div class="card card-body mg-t-10">
                                    <h3>prestasi Siswa</h3>
                                    <hr>
                                    <div data-label="Example" class="df-example demo-table">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Keterangan Prestasi</th>
                                                    <th>Penambahan poin</th>
                                                    <th>Tanggal Prestasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($prestasi as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->siswa->NIS}}</td>
                                                    <td>{{$d->siswa->nama}}</td>
                                                    <td>{{$d->pedoman->uraian}}</td>
                                                    <td>
                                                        <p class="text-success">+ {{$d->pedoman->bobot_point}} poin</p>
                                                    </td>
                                                    <td>{{$d->tanggal_prestasi}}</td>
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


                <div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content tx-14">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel2">Tambah Kelas</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{Route('kelasSiswaStore')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                    <div class="form-group">
                                        <label for="Nama">Kelas</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control">
                                            <option value="">-- pilih Kelas --</option>
                                            @foreach($kelas as $d)
                                            <option value="{{$d->id}}">{{$d->kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama">Tahun Ajaran</label>
                                        <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control">
                                            <option value="">-- pilih tahun ajaran --</option>
                                            @foreach($tahun_ajaran as $d)
                                            <option value="{{$d->id}}">{{$d->tahun_ajaran}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary tx-13"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary tx-13"><i data-feather="save"
                                        class="wd-10 mg-r-5"></i>
                                    Simpan</button>
                            </div>
                            </form>
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

                        </script>
                        @endsection