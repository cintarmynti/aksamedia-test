<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admins::create([
            'name' => 'admin',
            'password' => 'pastibisa',
            'username' => 'Cinta Ramayanti admin',
            'phone'=> '085791548579',
            'email' => 'ramayanticinta@gmail.com'
        ]);


        Admins::create([
            'name' => 'Rhimba',
            'password' => 'pastibisa',
            'username' => 'Rhimba Aulia',
            'phone'=> '08577438992',
            'email' => 'rhimbaAulll@gmail.com'
        ]);

        Admins::create([
            'name' => 'Habib',
            'password' => 'pastibisa',
            'username' => 'Habeebb nurrohmad',
            'phone'=> '08548392440',
            'email' => 'habibnurrohmadd@gmail.com'
        ]);

        Admins::create([
            'name' => 'dwiiii',
            'password' => 'pastibisa',
            'username' => 'Dwi my lil brother',
            'phone'=> '08577432312',
            'email' => 'dwidarma@gmail.com'
        ]);
    }
}
