<?php

use Illuminate\Database\Seeder;
use App\Waktu;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Waktu;
        $s->nama_hari = 'senin - kamis';
        $s->jam = '09:00 - 12.00 Wita';
        $s->save();
        
        $s = new Waktu;
        $s->nama_hari = 'senin - kamis';
        $s->jam = '13:30 - 16.30 Wita';
        $s->save();
        
        $s = new Waktu;
        $s->nama_hari = 'jumat';
        $s->jam = '14:00 - 16.30 Wita';
        $s->save();
        
        $s = new Waktu;
        $s->nama_hari = 'sabtu';
        $s->jam = '10:00 - 12.00 Wita';
        $s->save();
        
        $s = new Waktu;
        $s->nama_hari = 'sabtu';
        $s->jam = '13:30 - 16.30 Wita';
        $s->save();
    }
}
