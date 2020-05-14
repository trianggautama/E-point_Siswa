<?php

namespace App\Http\Controllers;

use App\Pejabat_struktural; 

class PejabatController extends Controller
{
    public function index()
    {
        $data = Pejabat_struktural::orderBy('id', 'desc')->get();

        return view('admin.pejabat.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Pejabat_struktural;
        $data->NIP = $request->NIP;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->save();

        return redirect()->route('pejabatIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Pejabat_struktural::where('uuid', $uuid)->first();

        return view('admin.pejabat.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Pejabat_struktural::where('uuid', $uuid)->first();

        $data->NIP = $request->NIP;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->update();

        return redirect()->route('pejabatIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($uuid)
    {
        $data = Pejabat_struktural::where('uuid', $uuid)->first()->delete();

        return redirect()->route('userIndex')->with('success', 'Berhasil menghapus data');

    }
}

}
