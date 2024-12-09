<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('renters')->insert([
            ['id' => 1, 'name' => 'John Doe', 'phone_number' => 12345, 'email' => 'johndoe@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'phone_number' => 238901, 'email' => 'janesmith@example.com'],
            ['id' => 3, 'name' => 'Robert Brown', 'phone_number' => 789012, 'email' => 'robertbrown@example.com'],
            ['id' => 4, 'name' => 'Emily Davis', 'phone_number' => 4590123, 'email' => 'emilydavis@example.com'],
            ['id' => 5, 'name' => 'Michael Wilson', 'phone_number' => 01234, 'email' => 'michaelwilson@example.com'],
        ]);
    }
}
