<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;

class pointController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('nama', 'asc')->get();
        return view('admin.point.index', compact('data'));
    }

    public function filterKelas()
    {
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        return view('admin.point.filterKelas', compact('kelas'));
    }
}
