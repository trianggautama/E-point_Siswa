@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Pedoman</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Data Pedoman</h4>
            </div>
            <div class="d-none d-md-block">
            <a href="{{Route('pedomanFilter')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Filter Data</a>
                <a href="{{Route('pedomanCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Cetak Data</a>
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
                                    <th>Kode Pedoman</th>
                                    <th>uraian</th>
                                    <th>Bobot Poin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_pedoman}}</td>
                                    <td>{{$d->uraian}}</td>
                                    <td>{{$d->bobot_point}} poin</td>
                                    <td>
                                        @if($d->status == 1)
                                            <p class="text-danger"> Pelanggaran</p>
                                        @else
                                            <p class="text-primary"> Prestasi</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{Route('pedomanEdit',['uuid'=>$d->uuid])}}"
                                            class="btn btn-primary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-icon"
                                            onclick="Hapus('{{$d->uuid}}','{{$d->kode_pedoman}}')">
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
                <form action="{{Route('pedomanStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Kode Pedoman">Kode Pedoman</label>
                        <input type="text" name="kode_pedoman" class="form-control" placeholder="Nomor induk Siswa">
                    </div>
                    <div class="form-group">
                        <label for="Bobot Poin">Uraian</label>
                        <textarea  name="uraian" class="form-control" > </textarea>
                    </div>
                    <div class="form-group">
                        <label for="Bobot Poin">Bobot Poin</label>
                        <input type="number" name="bobot_point" class="form-control" placeholder="Bobot Poin">
                    </div>
            
        <div class="form-group">
            <label for="Nama">Status </label>
                <select name="status" id="status" class="form-control">
                    <option value="">-- pilih Status  --</option>
                    <option value="1">Pelanggaran</option>
                    <option value="2">Prestasi</option>
                </select>
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

    function Hapus(uuid, kode) {
        Swal.fire({
            title: 'Anda Yakin?',
            text: " Menghapus data Pedoman Kode  '" + kode,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                url = '{{route("pedomanDestroy",'')}}';
                window.location.href = url + '/' + uuid;
            }
        })
    }

</script>
@endsection
