<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {

        return view('admin.tahun_ajaran.index');
    }

    public function store(Request $request)
    {
       
        return redirect()->route('tahunAjaranIndex')->with('success', 'Data Berhasil Disimpan');
    }


    public function edit($uuid)
    {
       

        return view('admin.tahun_ajaran.edit');
    }

    public function update(Request $request, $uuid)
    {
      

        return redirect()->route('tahunAjaranIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($uuid)
    {
        
        return redirect()->route('tahunAjaranIndex')->with('success', 'Berhasil menghapus data');

    }
}
