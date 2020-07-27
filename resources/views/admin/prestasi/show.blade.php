@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Pretasi</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Detail Pretasi Siswa</h4>
            </div>
            <div class="d-none d-md-block">
                <a class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5" href="#modal2" data-toggle="modal"><i
                        data-feather="plus" class="wd-10 mg-r-5"></i> tambah rincian</a>
                <a href="{{Route('prestasiIndex')}}" class="btn btn-sm pd-x-15 btn-secondary btn-uppercase mg-l-5"><i
                        data-feather="arrow-left" class="wd-10 mg-r-5"></i> Kembali</a>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card">
                    <div class="card-header">
                        Detail prestasi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama
                                        Siswa</label>
                                    <p class="mg-b-0">{{$data->siswa->nama}}</p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nomor
                                        Induk Siswa</label>
                                    <p class="mg-b-0">{{$data->siswa->NIS}}</p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Kelas</label>
                                    <p class="mg-b-0">Kelas {{$data->siswa->kelas->kelas}}</p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Tanggal
                                        Prestasi</label>
                                    <p class="mg-b-0">{{$data->tanggal_prestasi}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Jenis
                                        Prestasi</label>
                                    <p class="mg-b-0 text-justify">{{$data->pedoman->uraian}}</p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Penambahan
                                        poin</label>
                                    <p class="mg-b-0 text-success ">+ {{$data->pedoman->bobot_point}}</p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">File
                                        Lampiran</label> <br>
                                    @foreach($data->lampiran as $l)
                                    <a class="btn btn-sm btn-success" href="{{asset('lampiran/'.$l->file)}}"
                                        target="_blank"> <i data-feather="paperclip"></i> File Lampiran</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nama
                                        Kejuaraan / Lomba</label>
                                    <p class="mg-b-0 text-justify">
                                        @if(isset($data->detail_prestasi))
                                        {{$data->detail_prestasi->nama_kejuaraan}}
                                        @else
                                        -
                                        @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Penyelenggara</label>
                                    <p class="mg-b-0  ">
                                        @if(isset($data->detail_prestasi))
                                        {{$data->detail_prestasi->penyelenggara}}
                                        @else
                                        -
                                        @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">tingkat</label>
                                    <br>
                                    <p class="mg-b-0  ">
                                        @if(isset($data->detail_prestasi))
                                        {{$data->detail_prestasi->tingkat}}
                                        @else
                                        -
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div>


</div>
</div>


</div><!-- container -->
</div>

<!-- modal -->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel2">Tambah Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('detailStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="prestasi_id" value="{{$data->id}}" id="">
                    <div class="form-group">
                        <label for="Nama">Nama Kejuaraan / Lomba</label>
                        <input type="text" class="form-control" name="nama_kejuaraan" @if(isset($data->detail_prestasi))
                        value="{{$data->detail_prestasi->nama_kejuaraan}}"
                        @endif
                        id="nama_kejuaraan">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" @if(isset($data->detail_prestasi))
                        value="{{$data->detail_prestasi->penyelenggara}}"
                        @endif id="penyelenggara">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Tingkat</label>
                        <select name="tingkat" id="" class="form-control">
                            <option value="Internal Sekolah" @if(isset($data->detail_prestasi))
                                {{$data->detail_prestasi->tingkat == 'Internal Sekolah' ? 'selected' : ''}}
                                @endif
                                >Internal Sekolah</option>
                            <option value="kabupaten Kota" @if(isset($data->detail_prestasi))
                                {{$data->detail_prestasi->tingkat == 'kabupaten Kota' ? 'selected' : ''}}
                                @endif
                                >kabupaten Kota</option>
                            <option value="Provinsi" @if(isset($data->detail_prestasi))
                                {{$data->detail_prestasi->tingkat == 'Provinsi' ? 'selected' : ''}}
                                @endif
                                >Provinsi</option>
                            <option value="Nasional" @if(isset($data->detail_prestasi))
                                {{$data->detail_prestasi->tingkat == 'Nasional' ? 'selected' : ''}}
                                @endif
                                >Nasional</option>
                            <option value="Internasional" @if(isset($data->detail_prestasi))
                                {{$data->detail_prestasi->tingkat == 'Internasional' ? 'selected' : ''}}
                                @endif
                                >Internasional</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tx-13"><i data-feather="save"
                                class="wd-10 mg-r-5"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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