<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'name' => 'Mobile Apps',
        ]);

        Divisi::create([
            'name' => 'QA',
        ]);

        Divisi::create([
            'name' => 'Full Stack',
        ]);

        Divisi::create([
            'name' => 'Backend',
        ]);

        Divisi::create([
            'name' => 'Frontend',
        ]);

        Divisi::create([
            'name' => 'UI/UX Desainer',
        ]);
    }
}
