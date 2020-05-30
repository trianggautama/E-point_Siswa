<?php

namespace App\Http\Controllers;

use App\Pedoman;
use PDF;
use App\Siswa;
use App\Wali_siswa;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function siswaAll()
    {
        $data         = siswa::all();
        $pdf          = PDF::loadView('formCetak.siswaKeseluruhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data siswa.pdf');
    }

    public function siswaFilter(Request $req)
    {
        $data         = siswa::where('kelas_id',$req->kelas_id)->get();
        $pdf          = PDF::loadView('formCetak.siswaFilter', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data siswa  Filter Kelas.pdf');
    }

    public function wali()
    {
        $data         = Wali_siswa::all();
        $pdf          = PDF::loadView('formCetak.waliSiswa', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Wali.pdf');
    }

    public function pedomanAll()
    {
        $data         = Pedoman::all();
        $pdf          = PDF::loadView('formCetak.pedomanKeseluruhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pedoman Point.pdf');
    }

    public function pedomanFilter(Request $req)
    {
        $data         = Pedoman::where('status',$req->status)->get();
        $pdf          = PDF::loadView('formCetak.pedomanFilter', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pedoman  Filter.pdf');
    }
}
