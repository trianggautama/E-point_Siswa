@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-">
                        <li class="breadcrumb-item"><a href="#">Data pelanggaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Edit pelanggaran</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card card-body ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nama">Siswa</label>
                            <select name="siswa_id" class="selectpicker form-control" data-live-search="true">
                                @foreach($siswa as $s)
                                <option value="{{$s->id}}" {{$s->id == $data->siswa_id ? 'selected' : ''}}>{{$s->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Panduan pelanggaran</label>
                            <select name="pedoman_id" class="selectpicker form-control" data-live-search="true">
                                @foreach($pedoman as $s)
                                <option value="{{$s->id}}" {{$s->id == $data->pedoman_id ? 'selected' : ''}}>
                                    {{$s->uraian}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Tanggal pelanggaran</label>
                            <input type="date" class="form-control" name="tanggal_pelanggaran"
                                value="{{$data->tanggal_pelanggaran}}" id="tanggal_pelanggaran">
                        </div>
                        <div class="form-group">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">File Lampiran</label> <br>
                            @foreach($data->lampiran as $l)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-secondary" href="{{asset('lampiran/'.$l->file)}}" target="_blank"> <i data-feather="paperclip"></i> {{$l->file}}</a>
                                <a class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="Hapus Lampiran"><i data-feather="delete"></i></a>
                            </div>
                            @endforeach
                        </div>
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
                    <br>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary tx-13"><i data-feather="save"
                                    class="wd-10 mg-r-5"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
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