<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{   
    public function index()
    {
        return view('admin.index');
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
