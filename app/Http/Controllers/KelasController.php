<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Pelanggaran;
use App\Prestasi;
use App\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::orderBy('id', 'desc')->get();

        return view('admin.kelas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Kelas;
        $data->kelas = $request->kelas;
        $data->save();

        return redirect()->route('kelasIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();
        $siswa = Siswa::orderBy('point', 'desc')->where('kelas_id',$data->id)->get();
        $nama = $siswa->pluck('nama');
        $prestasi = $siswa->map(function($item){
            return Prestasi::where('siswa_id',$item->id)->count();
        });

        $pelanggaran = $siswa->map(function($item){
            return Pelanggaran::where('siswa_id',$item->id)->count();
        });
        return view('admin.kelas.show', compact('data','siswa','nama','prestasi','pelanggaran'));
    }

    public function edit($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();

        return view('admin.kelas.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();
        $data->kelas = $request->kelas;
        $data->update();

        return redirect()->route('kelasIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first()->delete();

        return redirect()->route('kelasIndex')->with('success', 'Berhasil menghapus data');

    }
}
