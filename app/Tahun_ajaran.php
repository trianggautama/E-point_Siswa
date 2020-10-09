<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    use Uuid;

    protected $guarded = [];

    public function kelas_siswa()
    {
        return $this->HasMany(Kelas_siswa::class);
    }

    public function prestasi()
    {
        return $this->HasMany(Prestasi::class);
    }

    public function pelanggaran()
    {
        return $this->HasMany(Pelanggaran::class);
    }

    public function konsultasi()
    {
        return $this->HasMany(Konsultasi::class);
    }
}
