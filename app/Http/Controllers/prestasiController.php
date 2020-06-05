<?php

namespace App\Http\Controllers;

use App\Lampiran;
use App\Pedoman;
use App\Prestasi;
use App\Siswa;
use Illuminate\Http\Request;

class prestasiController extends Controller
{
    public function index()
    {
        $data = Prestasi::orderBy('id', 'desc')->get();
        $siswa = Siswa::all();
        $pedoman = Pedoman::where('status', 2)->get();
        return view('admin.prestasi.index', compact('siswa', 'pedoman', 'data'));
    }

    public function edit($uuid)
    {
        $data = Prestasi::where('uuid', $uuid)->first();
        $siswa = Siswa::all();
        $pedoman = Pedoman::where('status', 2)->get();
        return view('admin.prestasi.edit', compact('siswa', 'pedoman', 'data'));
    }

    public function show($uuid)
    {
        $data = Prestasi::where('uuid', $uuid)->first();
        return view('admin.prestasi.show', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Prestasi::create($req->all());
        $prestasi_id = $data->id;
        if ($req->file != null) {
            foreach ($req->file('file') as $d) {
                $lampiran = new Lampiran;
                $FotoExt = $d->getClientOriginalExtension();
                $FotoName = 'prestasi_' . $data->siswa->NIS . '_' . $data->id++;
                $file = $FotoName . '.' . $FotoExt;
                $d->move('lampiran', $file);

                $lampiran->prestasi_id = $prestasi_id;
                $lampiran->file = $file;
                $lampiran->save();
            }
        }
        $siswa = Siswa::findOrfail($req->siswa_id);
        $siswa->point = $siswa->point + $data->pedoman->bobot_point;
        $siswa->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function update(Request $req, $uuid)
    {
        $data = Prestasi::where('uuid', $uuid)->first();
        $count = $data->lampiran()->count();
        $data->fill($req->all())->save();
        if ($req->file != null) {
            $lampiran = new Lampiran;
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = 'prestasi_' . $data->siswa->NIS . '_' . $count++;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('lampiran', $file);
            $lampiran->file = $file;
        }

        // Storage::delete(['file.jpg', 'file2.jpg']);

        return redirect()->route('prestasiIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Prestasi::where('uuid', $uuid)->first();
        $point = $data->pedoman->bobot_point;
        $siswa = Siswa::findOrFail($data->siswa_id);
        $siswa->point = $siswa->point - $point;
        $siswa->update();
        $data->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function filter()
    {
        $pedoman = Pedoman::where('status', 2)->get();
        return view('admin.pelanggaran.filter', compact('pedoman'));
    }
}
