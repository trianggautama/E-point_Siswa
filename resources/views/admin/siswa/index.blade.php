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
                <h4 class="mg-b-0 tx-spacing--1">Data Siswa</h4>
            </div>
            <div class="d-none d-md-block">
                <a href="{{Route('siswaFilter')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
                        class="wd-10 mg-r-5"></i> Filter Kelas</a>
                <a href="{{Route('siswaCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->NIS}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->kelas->kelas}}</td>
                                    <td>{{$d->tempat_lahir}}, {{$d->tanggal_lahir}}</td>
                                    <td>
                                        <a href="{{Route('siswaShow',['uuid'=>$d->uuid])}}"
                                            class="btn btn-info btn-icon">
                                            <i data-feather="info"></i>
                                        </a>
                                        <a href="{{Route('siswaEdit',['uuid'=>$d->uuid])}}"
                                            class="btn btn-primary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-icon"
                                            onclick="Hapus('{{$d->uuid}}','{{$d->nama}}')">
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
                <form action="{{Route('siswaStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="NIS">NIS</label>
                        <input type="text" name="NIS" class="form-control" placeholder="Nomor induk Siswa">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value="">-- pilih kelas --</option>
                            @foreach($kelas as $k)
                            <option value="{{$k->id}}">{{$k->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                    </div>
            <div class="form-group">
                <label for="Nama">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali Siswa">
            </div>
        <div class="form-group">
            <label for="Nama">Nomor Telepon Wali Siswa</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon">
        </div>
        <div class="form-group">
            <label for="Nama">Status Wali Siswa</label>
                <select name="status_wali" id="status_wali" class="form-control">
                    <option value="">-- pilih Status Wali --</option>
                    <option value="1">Ayah</option>
                    <option value="2">ibu</option>
                    <option value="3">Kakak</option>
                    <option value="4">Kerabat Orangtua</option>
                </select>
            </div>
    <div class="form-group">
        <label for="Nama">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
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

    function Hapus(uuid, nama) {
        Swal.fire({
            title: 'Anda Yakin?',
            text: " Menghapus data Siswa  '" + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                url = '{{route("siswaDestroy",'')}}';
                window.location.href = url + '/' + uuid;
            }
        })
    }

</script>
@endsection
