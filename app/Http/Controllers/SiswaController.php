<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Kelas_siswa;
use App\Lampiran;
use App\Pelanggaran;
use App\Prestasi;
use App\Siswa;
use App\Tahun_ajaran;
use App\Wali_siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id', 'desc')->get();
        $data = $data->map(function ($item) {
            if (isset($item->kelas_siswa)) {
                $id = $item->kelas_siswa->last();
                // dd($id);
                if (isset($id)) {
                    $kelas = Kelas::findOrFail($id->kelas_id);
                    $item['kelas'] = $kelas->kelas;
                } else {
                    $item['kelas'] = 'Kelas belum diinput';
                }
            }
            return $item;
        });
        $kelas = Kelas::orderBy('id', 'desc')->get();
        return view('admin.siswa.index', compact('data', 'kelas'));
    }

    public function store(Request $request)
    {

        $data = new siswa;
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->point = 100;
        $data->save();

        $wali = new Wali_siswa;
        $wali->siswa_id = $data->id;
        $wali->nama = $request->nama_wali;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->save();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $pelanggaran = Pelanggaran::where('siswa_id', $data->id)->get();
        $prestasi = Prestasi::where('siswa_id', $data->id)->get();
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        $tahun_ajaran = Tahun_ajaran::latest()->get();
        $kelas_siswa = Kelas_siswa::all();

        return view('admin.siswa.show', compact('data', 'pelanggaran', 'prestasi', 'kelas', 'tahun_ajaran', 'kelas_siswa'));
    }

    public function edit($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('data', 'kelas'));
    }

    public function update(Request $request, $uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->NIS = $request->NIS;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->update();

        $wali = Wali_siswa::findOrfail($data->wali_siswa->id);
        $wali->nama = $request->nama_wali;
        $wali->no_hp = $request->no_hp;
        $wali->alamat = $request->alamat;
        $wali->status_wali = $request->status_wali;
        $wali->update();

        return redirect()->route('siswaIndex')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($uuid)
    {
        $data = siswa::where('uuid', $uuid)->first();
        $prestasi = Prestasi::where('siswa_id', $data->id)->get();
        if($prestasi->isNotEmpty()){
            $prestasi = $prestasi->map(function ($item) {

                $lampiran = Lampiran::where('file', 'like', '%' . 'prestasi_' . $item->id . '_' . $item->siswa->id . '%')->get();
                $lampiran = $lampiran->map(function ($item) {
                    File::delete('lampiran/' . $item->file);
                });
            });

            $data->prestasi()->delete();
        }
        $pelanggaran = Pelanggaran::where('siswa_id', $data->id)->get();

        if($pelanggaran->isNotEmpty()){
            $pelanggaran = $pelanggaran->map(function ($item) {
    
                $lampiran = Lampiran::where('file', 'like', '%' . 'pelanggaran_' . $item->id . '_' . $item->siswa->id . '%')->get();
    
                // $lampiran = Lampiran::where('file', 'like', '%' . $item->siswa->NIS . '%')->get();
                $lampiran = $lampiran->map(function ($item) {
                    File::delete('lampiran/' . $item->file);
                });
            });
    
            $data->pelanggaran()->delete();
        }

       
        $data->konsultasi()->delete();
        $data->kelas_siswa()->delete();

        $data->delete();

        return redirect()->route('siswaIndex')->with('success', 'Berhasil menghapus data');

    }

    public function filter()
    {
        $kelas = Kelas::orderBy('id', 'desc')->get();
        $tahun_ajaran = Tahun_ajaran::latest()->get();
        return view('admin.siswa.filter', compact('kelas','tahun_ajaran'));
    }

    public function kelasSiswaStore(Request $req)
    {
        $data = Kelas_siswa::create($req->all());

        return back()->withSuccess('Data berhasil disimpan');
    }

    public function kelasSiswaDestroy($uuid)
    {
        $data = Kelas_siswa::where('uuid', $uuid)->first()->delete();

        return back();
    }
}
