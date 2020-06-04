<?php

namespace App\Http\Controllers;

use App\Siswa;

class pointController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('nama', 'asc')->get();
        return view('admin.point.index', compact('data'));
    }
}
