<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pointController extends Controller
{
    public function index()
    {
        return view('admin.point.index');
    }
}
