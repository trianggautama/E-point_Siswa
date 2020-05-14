<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Wali_siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = siswa::orderBy('id', 'desc')->get();

        return view('admin.siswa.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new siswa;
        $data->kelas_id = $request->kelas_id;
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->point = $request->point;
        $data->save();

        $wali = new Wali_siswa;
        $wali->siswa_id = $data->id;
        $wali->nama = $request->nama;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->save();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();

        return view('admin.siswa.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();

        return view('admin.siswa.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->point = $request->point;
        $data->update();

        $wali = Wali_siswa::findOrfail($data->wali_siswa->id);
        $wali->nama = $request->nama;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->update();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy()
    {
        $data = siswa::where('uuid', $uuid)->first()->delete();

        return redirect()->route('siswaIndex')->with('success', 'Berhasil menghapus data');

    }
}
