<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use Uuid;

    public function siswa()
    {
        return $this->BelongsToMany(Siswa::class);
    }
}
