<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            [
                'id' => 1,
                'grade_level' => 'Pre-K',
                'room_number' => '101A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'grade_level' => 'Kindergarten',
                'room_number' => '102B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'grade_level' => 'Pre-K',
                'room_number' => '103C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
