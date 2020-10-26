<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\Pedoman;
use PDF;
use App\Siswa;
use App\Kelas;
use App\Kelas_siswa;

use App\Pejabat_struktural;
use App\Pelanggaran;
use App\Prestasi;
use App\Tahun_ajaran;
use App\Wali_siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
 
class reportController extends Controller
{
    public function pegawaiAll()
    {
        $data         = Pejabat_struktural::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.pegawaiKeseluruhan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pegawai.pdf');
    }

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
        $kelas = Kelas::where('id', $req->kelas_id)->first();
        $tahun_ajaran = Tahun_ajaran::latest()->first();
        $data = Kelas_siswa::with('siswa')->where('kelas_id',$kelas->id)->where('tahun_ajaran_id',$tahun_ajaran->id)->get();        
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.siswaFilter', ['data'=>$data,'tgl'=>$tgl,'kelas'=>$kelas]);
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
        $pdf->setPaper('a4', 'landscape');

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
        $kelas = Kelas::where('id', $request->kelas_id)->first();
        $tahun_ajaran = Tahun_ajaran::latest()->first();
        $data = Siswa::whereHas('kelas_siswa', function($query)use($kelas,$tahun_ajaran)
        {
            $query->where('kelas_id',$kelas->id)->where('tahun_ajaran_id',$tahun_ajaran->id);
        })->with('kelas_siswa')
          ->orderBy('point', 'desc')
          ->get();        $tgl= Carbon::now()->format('d-m-Y');
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
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Prestasi Siswa.pdf');
    }

    public function prestasiFilter(Request $request)
    {
        $pedoman      = Pedoman::findOrFail($request->pedoman_id);
        $tgl= Carbon::now()->format('d-m-Y');
        $data         = Prestasi::where('pedoman_id',$request->pedoman_id)->get();
        $pdf          = PDF::loadView('formCetak.prestasiFilter', ['data'=>$data,'pedoman'=>$pedoman,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Filter Prestasi Siswa.pdf');
    }

    public function prestasiSiswa($uuid)
    {
        $data         = Siswa::where('uuid',$uuid)->first();
        $tgl          = Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.prestasiSiswa', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Prestasi dan Pelanggaran Siswa.pdf');
    }

    public function pelanggaranFilterWaktu(Request $request)
    {
        $tgl_awal     = $request->tgl_awal;
        $tgl_akhir    = $request->tgl_akhir;
        $tgl          = Carbon::now()->format('d-m-Y');
        $data         = Pelanggaran::whereBetween('tanggal_pelanggaran', [$tgl_awal, $tgl_akhir])->where('tahun_ajaran_id',$request->tahun_ajaran)->get();
        $pdf          = PDF::loadView('formCetak.pelanggaranFilterWaktu', ['data'=>$data,'tgl'=>$tgl,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Filter Pelanggaran Siswa filter Waktu.pdf');
    }

    public function prestasiFilterWaktu(Request $request)
    {
        $tgl_awal     = $request->tgl_awal;
        $tgl_akhir    = $request->tgl_akhir;
        $tgl          = Carbon::now()->format('d-m-Y');
        $data         = Prestasi::whereBetween('tanggal_prestasi', [$tgl_awal, $tgl_akhir])->where('tahun_ajaran_id',$request->tahun_ajaran)->get();
        $pdf          = PDF::loadView('formCetak.prestasiFilterWaktu', ['data'=>$data,'tgl'=>$tgl,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Filter Prestasi Siswa filter Waktu.pdf');
    }

    public function konsultasiFilterWaktu(Request $request)
    {
        $tgl_awal     = $request->tgl_awal;
        $tgl_akhir    = $request->tgl_akhir;
        $tgl          = Carbon::now()->format('d-m-Y');
        $data         = Konsultasi::whereBetween('tanggal_konseling', [$tgl_awal, $tgl_akhir])->where('tahun_ajaran_id',$request->tahun_ajaran)->get();
        $pdf          = PDF::loadView('formCetak.konsultasiFilterWaktu', ['data'=>$data,'tgl'=>$tgl,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Filter konsultasi Siswa filter Waktu.pdf');
    }

    public function suratPemanggilan($uuid)
    {
        $data         = Siswa::where('uuid',$uuid)->first();
        $tgl          = Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.suratPemanggilan', ['data'=>$data,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Surat Pemanggilan');
    }

}
