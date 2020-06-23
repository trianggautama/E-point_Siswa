<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\Pedoman;
use PDF;
use App\Siswa;
use App\Kelas;
use App\Pelanggaran;
use App\Prestasi;
use App\Wali_siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function siswaAll()
    {
        $data         = siswa::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.siswaKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data siswa.pdf');
    }

    public function siswaFilter(Request $req)
    {
        $data         = siswa::where('kelas_id',$req->kelas_id)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.siswaFilter', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data siswa  Filter Kelas.pdf');
    }

    public function wali()
    {
        $data         = Wali_siswa::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.waliSiswa', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Wali.pdf');
    }

    public function pedomanAll()
    {
        $data         = Pedoman::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.pedomanKeseluruhan', ['data'=>$data, 'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pedoman Point.pdf');
    }

    public function pedomanFilter(Request $req)
    {
        $data         = Pedoman::where('status',$req->status)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.pedomanFilter', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pedoman  Filter.pdf');
    }

    public function konsultasiAll()
    {
        $data         = Konsultasi::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.konsultasiKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Konsultasi Siswa.pdf');
    }

    public function poinAll()
    {
        $data         = Siswa::orderBy('point', 'desc')->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.poinKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Poin Siswa.pdf');
    }

    public function poinFilterKelas(Request $request)
    {
        $kelas        = Kelas::findOrFail($request->kelas_id);
        $tgl= Carbon::now()->format('d-m-Y');
        $data         = Siswa::where('kelas_id',$kelas->id)->orderBy('point', 'desc')->get();
        $pdf          = PDF::loadView('formCetak.poinFilterKelas', ['data'=>$data ,'kelas'=>$kelas,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Poin Siswa Per Kelas.pdf');
    }

    public function pelanggaranAll()
    {
        $data         = Pelanggaran::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.pelanggaranKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pelanggaran Siswa.pdf');
    }

    public function pelanggaranFilter(Request $request)
    {
        $pedoman      = Pedoman::findOrFail($request->pedoman_id);
        $tgl= Carbon::now()->format('d-m-Y');
        $data         = Pelanggaran::where('pedoman_id',$request->pedoman_id)->get();
        $pdf          = PDF::loadView('formCetak.pelanggaranFilter', ['data'=>$data,'pedoman'=>$pedoman,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Filter Pelanggaran Siswa.pdf');
    }

    public function prestasiAll()
    {
        $data         = Prestasi::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.prestasiKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Prestasi Siswa.pdf');
    }

    public function prestasiFilter(Request $request)
    {
        $pedoman      = Pedoman::findOrFail($request->pedoman_id);
        $tgl= Carbon::now()->format('d-m-Y');
        $data         = Prestasi::where('pedoman_id',$request->pedoman_id)->get();
        $pdf          = PDF::loadView('formCetak.prestasiFilter', ['data'=>$data,'pedoman'=>$pedoman,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Filter Prestasi Siswa.pdf');
    }
}
