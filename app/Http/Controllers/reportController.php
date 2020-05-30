<?php

namespace App\Http\Controllers;
use PDF;
use App\Siswa;
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
}
