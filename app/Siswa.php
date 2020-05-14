<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use Uuid;

    public function kelas()
    {
        return $this->BelongsTo(Kelas::class);
    }
}
