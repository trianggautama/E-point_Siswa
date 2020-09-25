<?php

namespace App\Http\Controllers;

use App\Detail_prestasi;
use App\Lampiran;
use App\Pedoman;
use App\Prestasi;
use App\Siswa;
use App\Tahun_ajaran;
use Illuminate\Http\Request;

class prestasiController extends Controller
{
    public function index()
    {
        $data = Prestasi::orderBy('id', 'desc')->get();
        $siswa = Siswa::all();
        $tahun_ajaran = Tahun_ajaran::all()->last();

        $pedoman = Pedoman::where('status', 2)->get();
        return view('admin.prestasi.index', compact('siswa', 'pedoman', 'data', 'tahun_ajaran'));
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
                $FotoName = 'prestasi_' . $prestasi_id . '_' . $data->siswa->id . '_' . $data->id++;
                // $FotoName = 'prestasi_' . $data->siswa->id . '_' . $data->id++;
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
            $FotoName = 'prestasi_' . $prestasi_id . '_' . $data->siswa->id . '_' . $count++;
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

    public function filterWaktu()
    {
        $tahun_ajaran = Tahun_ajaran::latest()->get();
        return view('admin.prestasi.filterWaktu',compact('tahun_ajaran'));
    }

    public function detailStore(Request $req)
    {
        $data = Detail_prestasi::where('prestasi_id', $req->prestasi_id)->first();

        if (isset($data)) {
            $data->fill($req->all())->save();
            return back()->withSuccess('Data berhasil diubah');
        } else {
            $data = Detail_prestasi::create($req->all());
            return back()->withSuccess('Data berhasil disimpan');
        }
    }
}
