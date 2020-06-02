<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Http\Request;

class konsultasiController extends Controller
{
    public function index()
    {   
        $siswa = Siswa::all();
        return view('admin.konsultasi.index',compact('siswa'));
    }

    public function edit()
    {   
        $siswa = Siswa::all();
        return view('admin.konsultasi.edit',compact('siswa'));
    }
}
