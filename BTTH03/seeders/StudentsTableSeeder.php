<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '2010-05-14',
                'parent_phone' => '0123456789',
                'class_id' => 1, // Tham chiếu đến lớp có id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '2011-03-22',
                'parent_phone' => '0987654321',
                'class_id' => 1, // Tham chiếu đến lớp có id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'date_of_birth' => '2010-12-02',
                'parent_phone' => '0912345678',
                'class_id' => 2, // Tham chiếu đến lớp có id = 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
