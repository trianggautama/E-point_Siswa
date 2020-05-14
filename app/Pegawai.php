<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Model
{
    use Uuid;
    use Notifiable;

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
