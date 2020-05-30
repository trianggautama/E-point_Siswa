<?php

namespace App\Http\Controllers;

use App\Wali_siswa;
use Illuminate\Http\Request;

class waliController extends Controller
{
    public function index()
    {
        $data = Wali_siswa::orderBy('id', 'desc')->get();
        return view('admin.wali.index', compact('data'));
    }
}
