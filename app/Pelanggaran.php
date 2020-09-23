<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use Uuid;

    protected $fillable = [
        'tahun_ajaran_id', 'siswa_id', 'pedoman_id', 'tanggal_pelanggaran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pedoman()
    {
        return $this->belongsTo(Pedoman::class);
    }

    public function lampiran()
    {
        return $this->hasMany(Lampiran::class);
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }

}
