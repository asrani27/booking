<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterkomunitas extends Model
{
    protected $table  = 'master_komunitas';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function ketua()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'anggota_komunitas','id_master_komunitas','id_anggota');
    }
}
