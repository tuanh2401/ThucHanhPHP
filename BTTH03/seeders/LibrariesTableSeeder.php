<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('libraries')->insert([
            ['id' => 1, 'name' => 'Central Library', 'address' => '123 Main St', 'contact_number' => 1234],
            ['id' => 2, 'name' => 'Community Library', 'address' => '456 Elm St', 'contact_number' => 234],
            ['id' => 3, 'name' => 'Northside Library', 'address' => '789 Pine St', 'contact_number' => 345],
            ['id' => 4, 'name' => 'Southside Library', 'address' => '101 Maple St', 'contact_number' => 456],
            ['id' => 5, 'name' => 'Eastside Library', 'address' => '202 Birch St', 'contact_number' => 567],
        ]);
        
    }
}
