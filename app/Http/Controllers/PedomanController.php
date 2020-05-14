<?php

namespace App\Http\Controllers;

use App\Pedoman;
use Illuminate\Http\Request;

class pedomanController extends Controller
{
    public function index()
    {
        $data = pedoman::orderBy('id', 'desc')->get();

        return view('admin.pedoman.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new pedoman;
        $data->kode_pedoman = $request->kode_pedoman;
        $data->bobot_point = $request->bobot_point;
        $data->uraian = $request->uraian;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('pedomanIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = pedoman::where('uuid', $uuid)->first();

        return view('admin.pedoman.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = pedoman::where('uuid', $uuid)->first();
        $data->kode_pedoman = $request->kode_pedoman;
        $data->bobot_point = $request->bobot_point;
        $data->uraian = $request->uraian;
        $data->status = $request->status;

        $data->update();

        return redirect()->route('pedomanIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy()
    {
        $data = pedoman::where('uuid', $uuid)->first()->delete();

        return redirect()->route('pedomanIndex')->with('success', 'Berhasil menghapus data');

    }
}
