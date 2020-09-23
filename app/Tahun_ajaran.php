<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    use Uuid;

    protected $guarded = [];
}
