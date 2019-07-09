<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = "peserta";

    public function pemko()
    {
        return $this->belongsTo(Pemko::class);
    }
}
