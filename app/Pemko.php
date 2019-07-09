<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemko extends Model
{
    protected $table = "pemko";

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
