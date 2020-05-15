@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-">
                        <li class="breadcrumb-item"><a href="#">Data Pedoman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Edit Pedoman</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card card-body ">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="Kode Pedoman">Kode Pedoman</label>
                        <input type="text" name="kode_pedoman" class="form-control" placeholder="Nomor induk Siswa" value="{{$data->kode_pedoman}}">
                    </div>
                    <div class="form-group">
                        <label for="Bobot Poin">Uraian</label>
                        <textarea  name="uraian" class="form-control" >{{$data->uraian}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="Bobot Poin">Bobot Poin</label>
                        <input type="number" name="bobot_point" class="form-control" placeholder="Bobot Poin" value="{{$data->bobot_point}}">
                    </div>
            
                    <div class="form-group">
                        <label for="Nama">Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- pilih Status  --</option>
                                <option value="1" {{  $data->status == 1 ? 'selected' : ''}}>Pelanggaran</option>
                                <option value="2" {{  $data->status == 2 ? 'selected' : ''}}>Prestasi</option>
                            </select>
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
