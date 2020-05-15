@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Data Kelas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Edit Kelas</h4>
            </div>
           
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-10">
                <div class="card card-body ">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" placeholder="kelas" value="{{$data->kelas}}">
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
                Search: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });

</script>
@endsection
