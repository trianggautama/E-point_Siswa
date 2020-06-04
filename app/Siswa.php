<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use Uuid;

    public function kelas()
    {
        return $this->BelongsTo(Kelas::class);
    }

    public function wali_siswa()
    {
        return $this->HasOne(Wali_siswa::class);
    }

    public function konsultasi()
    {
        return $this->HasMany(Konsultasi::class);
    }
}
