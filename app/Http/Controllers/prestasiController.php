<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Pedoman;
use Illuminate\Http\Request;

class prestasiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $pedoman = Pedoman::all();
        return view('admin.prestasi.index',compact('siswa','pedoman'));
    }
    public function edit()
    {   
        $siswa = Siswa::all();
        $pedoman = Pedoman::all();
        return view('admin.prestasi.edit',compact('siswa','pedoman'));
    }
}
