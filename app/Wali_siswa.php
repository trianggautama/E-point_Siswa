<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Wali_siswa extends Model
{
    use Uuid;

    public function siswa()
    {
        return $this->BelongsTo(Siswa::class);
    }
}
