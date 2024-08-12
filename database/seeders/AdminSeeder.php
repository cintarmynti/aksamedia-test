<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('pastibisa'),
            'username' => 'Cinta Ramayanti admin',
            'phone'=> '085791548579',
            'email' => 'ramayanticinta@gmail.com'
        ]);


        Admins::create([
            'name' => 'Rhimba',
            'password' => Hash::make('pastibisa'),
            'username' => 'Rhimba Aulia',
            'phone'=> '08577438992',
            'email' => 'rhimbaAulll@gmail.com'
        ]);

        Admins::create([
            'name' => 'Habib',
            'password' => Hash::make('pastibisa'),
            'username' => 'Habeebb nurrohmad',
            'phone'=> '08548392440',
            'email' => 'habibnurrohmadd@gmail.com'
        ]);

        Admins::create([
            'name' => 'dwiiii',
            'password' => Hash::make('pastibisa'),
            'username' => 'Dwi my lil brother',
            'phone'=> '08577432312',
            'email' => 'dwidarma@gmail.com'
        ]);
    }
}
