<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use Uuid;

    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class);
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }

}
