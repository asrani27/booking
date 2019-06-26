<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new User;
        $s->name = 'Administrator';
        $s->username = 'admin';
        $s->password = bcrypt('rahasia');
        $s->save();
    }
}
