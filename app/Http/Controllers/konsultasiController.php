<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\Pejabat_struktural;
use App\Siswa;
use Illuminate\Http\Request;

class konsultasiController extends Controller
{
    public function index()
    {
        $data = Konsultasi::orderBy('id', 'desc')->get();
        $siswa = Siswa::all();
        $guru = Pejabat_struktural::all();
        return view('admin.konsultasi.index', compact('siswa', 'data','guru'));
    }

    public function store(Request $req)
    {
        $siswa = Siswa::findOrFail($req->siswa_id);
        $data = $siswa->konsultasi()->create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Konsultasi::where('uuid', $uuid)->first();
        return view('admin.konsultasi.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Konsultasi::where('uuid', $uuid)->first();
        $siswa = Siswa::all();
        return view('admin.konsultasi.edit', compact('data', 'siswa'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Konsultasi::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        return redirect()->route('konsultasiIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Konsultasi::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

}
