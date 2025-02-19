<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            ['name' => 'Class A', 'grade' => '10'],
            ['name' => 'Class B', 'grade' => '11'],
            ['name' => 'Class C', 'grade' => '12'],
        ];

        foreach ($classes as $class) {
            SchoolClass::create($class);
        }
    }
}
