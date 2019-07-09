<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    protected $table = 'anggota';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function masterkomunitas()
    {
        return $this->hasMany(Masterkomunitas::class, 'anggota_id');
    }

    public function komunitas()
    {
        return $this->belongsToMany(Masterkomunitas::class, 'anggota_komunitas','id_anggota','id_master_komunitas');
    }
}
