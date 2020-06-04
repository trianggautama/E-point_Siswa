<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use Uuid;

    protected $fillable = [
        'siswa_id', 'uraian', 'tanggal_konseling',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
