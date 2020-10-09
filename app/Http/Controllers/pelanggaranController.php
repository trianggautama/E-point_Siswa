<?php

namespace App\Http\Controllers;

use App\Lampiran;
use App\Pedoman;
use App\Pelanggaran;
use App\Siswa;
use App\Tahun_ajaran;
use Illuminate\Http\Request;

class pelanggaranController extends Controller
{
    public function index()
    {
        $data = Pelanggaran::orderBy('id', 'desc')->get();
        $siswa = Siswa::all();
        $tahun_ajaran = Tahun_ajaran::latest()->get();
        $pedoman = Pedoman::where('status', 1)->get();
        return view('admin.pelanggaran.index', compact('siswa', 'pedoman', 'data', 'tahun_ajaran'));
    }

    public function show($uuid)
    {
        $data = Pelanggaran::where('uuid', $uuid)->first();
        return view('admin.pelanggaran.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Pelanggaran::where('uuid', $uuid)->first();
        $siswa = Siswa::all();
        $pedoman = Pedoman::where('status', 1)->get();
        return view('admin.pelanggaran.edit', compact('siswa', 'pedoman', 'data'));
    }

    public function store(Request $req)
    {
        $data = Pelanggaran::create($req->all());
        $pelanggaran_id = $data->id;
        if ($req->file != null) {
            foreach ($req->file('file') as $d) {
                $lampiran = new Lampiran;
                $FotoExt = $d->getClientOriginalExtension();
                $FotoName = 'pelanggaran_' . $pelanggaran_id . '_' . $data->siswa->id . '_' . $data->id++;
                $file = $FotoName . '.' . $FotoExt;
                $d->move('lampiran', $file);

                $lampiran->pelanggaran_id = $pelanggaran_id;
                $lampiran->file = $file;
                $lampiran->save();
            }
        }
        $siswa = Siswa::findOrfail($req->siswa_id);
        $siswa->point = $siswa->point - $data->pedoman->bobot_point;
        $siswa->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function update(Request $req, $uuid)
    {
        $data = Pelanggaran::where('uuid', $uuid)->first();
        $pelanggaran_id = $data->id;
        $count = $data->lampiran()->count();
        $data->fill($req->all())->save();
        if ($req->file != null) {
            $lampiran = new Lampiran;
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = 'pelanggaran_' . $pelanggaran_id . '_' . $data->siswa->id . '_' . $count++;
            // $FotoName = 'pelanggaran_' . $data->siswa->id . '_' . $count++;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('lampiran', $file);
            $lampiran->file = $file;
        }

        // Storage::delete(['file.jpg', 'file2.jpg']);

        return redirect()->route('pelanggaranIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Pelanggaran::where('uuid', $uuid)->first();
        $point = $data->pedoman->bobot_point;
        $siswa = Siswa::findOrFail($data->siswa_id);
        $siswa->point = $siswa->point + $point;
        $siswa->update();
        $data->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function filter()
    {
        $pedoman = Pedoman::where('status', 1)->get();
        return view('admin.pelanggaran.filter', compact('pedoman'));
    }

    public function filterWaktu()
    {
        $tahun_ajaran = Tahun_ajaran::latest()->get();
        return view('admin.pelanggaran.filterWaktu',compact('tahun_ajaran'));
    }
}
