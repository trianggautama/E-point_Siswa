<?php

namespace App\Http\Controllers;

use App\Pedoman;
use App\Pelanggaran;
use App\Prestasi;
use App\Siswa;
use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{   
    public function depan()
    {
        $data = Siswa::all();
        return view('welcome',compact('data'));
    }

    public function index()
    {
        $siswa       = Siswa::all();
        $pedoman     = Pedoman::all();
        $pelanggaran = Pelanggaran::all();
        $prestasi     = Prestasi::all();

        $pedomanPrestasi = Pedoman::where('status', 2)->get()->map(function($item){
            return Prestasi::where('pedoman_id', $item->id)->count();
        });

        $labelPrestasi = Pedoman::where('status', 2)->get()->map(function($item){
            return $item->uraian;
        });

        $pedomanPelanggaran = Pedoman::where('status', 1)->get()->map(function($item){
            return Pelanggaran::where('pedoman_id', $item->id)->count();
        });

        $labelPelanggaran = Pedoman::where('status', 1)->get()->map(function($item){
            return $item->uraian;
        });
        return view('admin.index',compact('siswa','pedoman','pelanggaran','prestasi','pedomanPrestasi','labelPrestasi','pedomanPelanggaran','labelPelanggaran'));
    }

    public function userIndex()
    {
        return view('admin.pegawai.index');
    }

    public function pejabatIndex()
    {
        return view('admin.pejabat.index');
    }
}
