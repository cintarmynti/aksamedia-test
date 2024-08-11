<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Alice Johnson',
            'phone' => '1234567890',
            'division' => 1, // Mobile Apps
            'position' => 'Manager'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Bob Smith',
            'phone' => '1234567891',
            'division' => 2, // QA
            'position' => 'QA Tester'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Carol Davis',
            'phone' => '1234567892',
            'division' => 3, // Full Stack
            'position' => 'Full Stack Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'David Wilson',
            'phone' => '1234567893',
            'division' => 4, // Backend
            'position' => 'Backend Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Eve Adams',
            'phone' => '1234567894',
            'division' => 5, // Frontend
            'position' => 'Frontend Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Frank Brown',
            'phone' => '1234567895',
            'division' => 6, // UI/UX Desainer
            'position' => 'UI/UX Designer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Grace Lee',
            'phone' => '1234567896',
            'division' => 1, // Mobile Apps
            'position' => 'Mobile Apps Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Hank Clark',
            'phone' => '1234567897',
            'division' => 2, // QA
            'position' => 'QA Engineer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Ivy Walker',
            'phone' => '1234567898',
            'division' => 3, // Full Stack
            'position' => 'Senior Full Stack Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Jack Thompson',
            'phone' => '1234567899',
            'division' => 4, // Backend
            'position' => 'Lead Backend Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Kara Scott',
            'phone' => '1234567800',
            'division' => 5, // Frontend
            'position' => 'Frontend Engineer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Liam Lewis',
            'phone' => '1234567801',
            'division' => 6, // UI/UX Desainer
            'position' => 'UI/UX Researcher'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Mia Young',
            'phone' => '1234567802',
            'division' => 1, // Mobile Apps
            'position' => 'Mobile App Designer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Noah King',
            'phone' => '1234567803',
            'division' => 2, // QA
            'position' => 'QA Lead'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Olivia Martinez',
            'phone' => '1234567804',
            'division' => 3, // Full Stack
            'position' => 'Full Stack Architect'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Paul Wright',
            'phone' => '1234567805',
            'division' => 4, // Backend
            'position' => 'Backend Engineer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Quinn Walker',
            'phone' => '1234567806',
            'division' => 5, // Frontend
            'position' => 'Senior Frontend Developer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Riley Harris',
            'phone' => '1234567807',
            'division' => 6, // UI/UX Desainer
            'position' => 'UX Specialist'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Sophia Moore',
            'phone' => '1234567808',
            'division' => 1, // Mobile Apps
            'position' => 'Mobile Apps Analyst'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Tom Evans',
            'phone' => '1234567809',
            'division' => 2, // QA
            'position' => 'QA Specialist'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Uma Roberts',
            'phone' => '1234567810',
            'division' => 3, // Full Stack
            'position' => 'Full Stack Engineer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Victor Turner',
            'phone' => '1234567811',
            'division' => 4, // Backend
            'position' => 'Backend Specialist'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Wendy Carter',
            'phone' => '1234567812',
            'division' => 5, // Frontend
            'position' => 'Frontend Specialist'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Xander Fisher',
            'phone' => '1234567813',
            'division' => 6, // UI/UX Desainer
            'position' => 'UI Designer'
        ]);

        Employee::create([
            'image' => 'https://picsum.photos/200',
            'name' => 'Yara Brooks',
            'phone' => '1234567814',
            'division' => 1, // Mobile Apps
            'position' => 'Mobile Apps Developer'
        ]);

    }
}
