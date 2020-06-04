@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Prestasi</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Data Prestasi</h4>
            </div>
            <div class="d-none d-md-block">
                <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Print</button>
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
                                    <th>NIS</th>
                                    <th>Keterangan Prestasi</th>
                                    <th>Penambahan poin</th>
                                    <th>Tanggal Prestasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->siswa->nama}}</td>
                                    <td>{{$d->siswa->NIS}}</td>
                                    <td>{{$d->pedoman->uraian}}</td>
                                    <td>
                                        <p class="text-success">+ {{$d->pedoman->bobot_point}} poin</p>
                                    </td>
                                    <td>{{$d->tanggal_prestasi}}</td>
                                    <td>
                                        <a href="{{Route('prestasiShow',['uuid'=>$d->uuid])}}" class="btn btn-white btn-icon">
                                            <i data-feather="info"></i>
                                        </a>
                                        <a href="{{Route('prestasiEdit',['uuid' => $d->uuid])}}"
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
                <form action="{{Route('prestasiStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Siswa</label>
                        <select name="siswa_id" class="selectpicker form-control" data-live-search="true">
                            @foreach($siswa as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Panduan prestasi</label>
                        <select name="pedoman_id" class="selectpicker form-control" data-live-search="true">
                            @foreach($pedoman as $s)
                            <option value="{{$s->id}}">{{$s->uraian}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Tanggal prestasi</label>
                        <input type="date" class="form-control" name="tanggal_prestasi" id="tanggal_prestasi">
                    </div>
                    <label for="Nama">File Lampiran</label> <br>
                    <div class="input-group control-group increment">
                        <input type="file" name="file[]" class="form-control form-control-sm mr-1" required>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary" id="tambahLampiran" type="button"><i
                                    class="glyphicon glyphicon-plus"></i>+ lampiran</button>
                        </div>
                    </div>
                    <div class="clone d-none">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="file[]" class="form-control form-control form-control-sm mr-1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button"><i class="fas fa-trash"></i>
                                    Hapus</button>
                            </div>
                        </div>
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
                url = '{{route("prestasiDestroy",'')}}';
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