@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Konsultasi Siswa</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Data Konsultasi</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="{{Route('konsultasiCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"
                    target="_blank"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</a>
                <a class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5" href="#modal2" data-toggle="modal"><i
                        data-feather="plus" class="wd-10 mg-r-5"></i> tambah Data</a>
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
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Uraian dan Saran</th>
                                    <th>Tanggal Konseling</th>
                                    <th>Nama Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->siswa->nama}}</td>
                                    <td>{{$d->siswa->kelas->kelas}}</td>
                                    <td width="300px">{{ \Illuminate\Support\Str::limit($d->uraian, 150, $end='...') }}
                                    </td>
                                    <td>{{carbon\carbon::parse($d->tanggal_konseling)->translatedFormat('d F Y')}}</td>
                                    <td>{{$d->pejabat->nama}}</td>
                                    <td>
                                        <a href="{{Route('konsultasiShow',['uuid' => $d->uuid])}}"
                                            class="btn btn-white btn-icon">
                                            <i data-feather="info"></i>
                                        </a>
                                        <a href="{{Route('konsultasiEdit',['uuid' => $d->uuid])}}"
                                            class="btn btn-primary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-icon"
                                            onclick="Hapus('{{$d->uuid}}','{{$d->siswa->nama}}')">
                                            <i data-feather="delete"></i>
                                        </button>
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
                <form action="{{Route('konsultasiStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama Guru</label>
                        <select class="selectpicker form-control" name="pejabat_struktural_id" data-live-search="true">
                            @foreach($guru as $g)
                            <option value="{{$g->id}}">{{$g->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Siswa</label>
                        <select class="selectpicker form-control" name="siswa_id" data-live-search="true">
                            @foreach($siswa as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Uraian</label>
                        <textarea name="uraian" id="uraian" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Tanggal Tanggal Konseling</label>
                        <input type="date" class="form-control" name="tanggal_konseling" id="tanggal_konseling">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i>
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
    $("#tambahLampiran").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
        });
        $("body").on("click",".btn-default",function(){ 
          $(this).parents(".control-group").remove();
        });
        function Hapus(uuid, nama) {
        Swal.fire({
            title: 'Anda Yakin?',
            text: " Menghapus data Konsultasi  '" + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                url = '{{route("konsultasiDestroy",'')}}';
                window.location.href = url + '/' + uuid;
            }
        })
    }
        $(function () {
            'use strict'

            $('#dataTable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    Search: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
         });
</script>
@endsection