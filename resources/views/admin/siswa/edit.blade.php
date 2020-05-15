@extends('layouts.main')

@section('content')
<div class="content-body">
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-">
                        <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Edit Siswa</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-xl-12 mg-t-5">
                <div class="card card-body ">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="NIS">NIS</label>
                            <input type="text" name="NIS" class="form-control" placeholder="Nomor induk Siswa" value="{{$data->NIS}}">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <option value="">-- pilih kelas --</option>
                                @foreach($kelas as $k)
                                <option value="{{$k->id}}" {{ $data->kelas_id == $k->id ? 'selected' : ''}}>{{$k->kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{$data->tanggal_lahir}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali Siswa" value="{{$data->wali_siswa->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nomor Telepon Wali Siswa</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon" value="{{$data->wali_siswa->no_hp}}">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Status Wali Siswa</label>
                            <select name="status_wali" id="status_wali" class="form-control">
                                <option value="">-- pilih Status Wali --</option>
                                <option value="1" {{  $data->wali_siswa->status_wali == 1 ? 'selected' : ''}}>Ayah</option>
                                <option value="2" {{  $data->wali_siswa->status_wali == 2 ? 'selected' : ''}}>ibu</option>
                                <option value="3" {{  $data->wali_siswa->status_wali == 3 ? 'selected' : ''}}>Kakak</option>
                                <option value="4" {{  $data->wali_siswa->status_wali == 4 ? 'selected' : ''}}>Kerabat Orangtua</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Alamat</label>
                            <textarea name="alamat" class="form-control">{{$data->wali_siswa->alamat}}</textarea>
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
