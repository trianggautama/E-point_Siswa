<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use Uuid;

    protected $fillable = [
        'siswa_id', 'uraian', 'tanggal_konseling', 'pejabat_struktural_id','tahun_ajaran_id', 'saran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pejabat()
    {
        return $this->belongsTo(Pejabat_struktural::class, 'pejabat_struktural_id');
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }

}
