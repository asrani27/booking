<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name','admin')->first();
        $roleAnggota = Role::where('name','anggota')->first();

        $s = new User;
        $s->name = 'Administrator';
        $s->username = 'admin';
        $s->email = 'admin@gmail.com';
        $s->password = bcrypt('rahasia');
        $s->save();
        $s->roles()->attach($roleAdmin);

        // $s = new User;
        // $s->name = 'Andi';
        // $s->username = 'anggota';
        // $s->email = 'andi@gmail.com';
        // $s->password = bcrypt('rahasia');
        // $s->save();
        // $s->roles()->attach($roleAnggota);
    }
}
