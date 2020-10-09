<?php

namespace App\Http\Controllers;

use App\Tahun_ajaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {

        $data = Tahun_ajaran::latest()->get();
        return view('admin.tahun_ajaran.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Tahun_ajaran::create($request->all());
        return redirect()->route('tahunAjaranIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Tahun_ajaran::where('uuid', $uuid)->first();
        return view('admin.tahun_ajaran.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Tahun_ajaran::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();
        return redirect()->route('tahunAjaranIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($uuid)
    {
        $data = Tahun_ajaran::where('uuid', $uuid)->first()->delete();
        return redirect()->route('tahunAjaranIndex')->with('success', 'Berhasil menghapus data');
    }
}
