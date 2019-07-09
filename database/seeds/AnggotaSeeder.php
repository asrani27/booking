<?php

use Illuminate\Database\Seeder;
use App\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Anggota;
        $s->nama = 'Andi';
        $s->alamat = 'Jl Pramuka Km 6';
        $s->email = 'andi@gmail.com';
        $s->telp = '0878 1441 4887';
        $s->users_id = 2;
        $s->save();
    }
}
