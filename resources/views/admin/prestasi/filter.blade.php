@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-">
                        <li class="breadcrumb-item"><a href="#">Data Pelanggaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Filter</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Filter Pelanggaran</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card card-body ">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="Nama">Daftar Prestasi</label>
                            <select name="pedoman_id" class="selectpicker form-control" data-live-search="true">
                                @foreach($pedoman as $s)
                                <option value="{{$s->id}}">{{$s->uraian}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="{{Route('pedomanIndex')}}" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</a>
                            <button type="submit" class="btn btn-primary tx-13"><i data-feather="printer"
                                    class="wd-10 mg-r-5"></i>
                                cetak</button>
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
