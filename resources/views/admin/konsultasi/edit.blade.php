@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-">
                        <li class="breadcrumb-item"><a href="#">Data Konsultasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Edit Konsultasi</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card card-body ">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nama">Nama Guru</label>
                            <select class="selectpicker form-control" name="pejabat_struktural_id"
                                data-live-search="true">
                                @foreach($guru as $g)
                                <option value="{{$g->id}}" {{$g->id == $data->pejabat_struktural_id ? 'selected' : ''}}>
                                    {{$g->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Siswa</label>
                            <select class="selectpicker form-control" name="siswa_id" data-live-search="true">
                                @foreach($siswa as $s)
                                <option value="{{$s->id}}" {{$s->id == $data->siswa_id ? 'selected' : ''}}>{{$s->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Uraian</label>
                            <textarea name="uraian" id="uraian" class="form-control"
                                rows="6">{{$data->uraian}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Saran</label>
                            <textarea name="saran" id="saran" class="form-control" rows="6">{{$data->saran}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Tanggal Tanggal Konseling</label>
                            <input type="date" class="form-control" name="tanggal_konseling"
                                value="{{$data->tanggal_konseling}}" id="tanggal_konseling">
                        </div>
                        <div class="modal-footer">
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