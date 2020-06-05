<?php

namespace App\Http\Controllers;

use App\Pedoman;
use App\Pelanggaran;
use App\Prestasi;
use App\Siswa;
use Illuminate\Http\Request;

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

        return view('admin.index',compact('siswa','pedoman','pelanggaran','prestasi'));
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
