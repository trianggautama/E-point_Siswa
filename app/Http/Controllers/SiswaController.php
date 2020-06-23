<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Lampiran;
use App\Pelanggaran;
use App\Prestasi;
use App\Siswa;
use App\Wali_siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id', 'desc')->get();
        $kelas = Kelas::orderBy('id', 'desc')->get();
        return view('admin.siswa.index', compact('data', 'kelas'));
    }

    public function store(Request $request)
    {

        $data = new siswa;
        $data->kelas_id = $request->kelas_id;
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->point = 100;
        $data->save();

        $wali = new Wali_siswa;
        $wali->siswa_id = $data->id;
        $wali->nama = $request->nama_wali;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->save();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $pelanggaran = Pelanggaran::where('siswa_id', $data->id)->get();
        $prestasi = Prestasi::where('siswa_id', $data->id)->get();

        return view('admin.siswa.show', compact('data', 'pelanggaran', 'prestasi'));
    }

    public function edit($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('data', 'kelas'));
    }

    public function update(Request $request, $uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->update();

        $wali = Wali_siswa::findOrfail($data->wali_siswa->id);
        $wali->nama = $request->nama_wali;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->update();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $prestasi = Prestasi::where('siswa_id', $data->id)->get();
        $prestasi = $prestasi->map(function ($item) {

            $lampiran = Lampiran::where('file', 'like', '%' . 'prestasi_' . $item->siswa->NIS . '%')->get();
            $lampiran = $lampiran->map(function ($item) {
                File::delete('lampiran/' . $item->file);
            });
        });
        $pelanggaran = Pelanggaran::where('siswa_id', $data->id)->get();
        $pelanggaran = $pelanggaran->map(function ($item) {

            $lampiran = Lampiran::where('file', 'like', '%' . $item->siswa->NIS . '%')->get();
            $lampiran = $lampiran->map(function ($item) {
                File::delete('lampiran/' . $item->file);
            });
        });

        $data->prestasi()->delete();
        $data->pelanggaran()->delete();
        $data->delete();

        return redirect()->route('siswaIndex')->with('success', 'Berhasil menghapus data');

    }

    public function filter()
    {
        $kelas = Kelas::orderBy('id', 'desc')->get();
        return view('admin.siswa.filter', compact('kelas'));
    }
}
