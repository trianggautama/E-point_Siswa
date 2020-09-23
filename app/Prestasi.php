<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use Uuid;

    protected $fillable = [
        'tahun_ajaran_id', 'siswa_id', 'pedoman_id', 'tanggal_prestasi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pedoman()
    {
        return $this->belongsTo(Pedoman::class);
    }

    public function detail_prestasi()
    {
        return $this->hasOne(Detail_prestasi::class);
    }

    public function lampiran()
    {
        return $this->hasMany(Lampiran::class);
    }
}
