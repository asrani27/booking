<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;

class PengelolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'pengelola',
            'display_name' => 'pengelola', 
            'description' => 'Mengelola Menu Agenda PLaza', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ]);
           
        $roleAnggota = Role::where('name','pengelola')->first();

        $s = new User;
        $s->name = 'pengelola';
        $s->username = 'pengelola';
        $s->email = 'pengelola@gmail.com';
        $s->password = bcrypt('plaza2019smartcity');
        $s->save();
        $s->roles()->attach($roleAnggota);

    }
}
