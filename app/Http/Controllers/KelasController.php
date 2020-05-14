<?php

namespace App\Http\Controllers;

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

    public function edit($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();

        return view('admin.kelas.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();
        $data->kelas = $request->kelas;

        return redirect()->route('kelasIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy()
    {
        $data = Kelas::where('uuid', $uuid)->first()->delete();

        return redirect()->route('kelasIndex')->with('success', 'Berhasil menghapus data');

    }
}
