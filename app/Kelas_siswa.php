<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kelas_siswa extends Model
{
    use Uuid;

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
