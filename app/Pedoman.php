<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pedoman extends Model
{
    use Uuid;

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

}
