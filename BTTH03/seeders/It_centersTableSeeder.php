<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class It_centersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('it_centers')->insert([
            ['id' => 1, 'name' => 'TechHub', 'location' => '123 Tech Street, Silicon Valley', 'email' => 'contact@techhub.com'],
            ['id' => 2, 'name' => 'InnovateIT', 'location' => '456 Innovation Road, Tech City', 'email' => 'info@innovateit.com'],
            ['id' => 3, 'name' => 'FutureTech', 'location' => '789 Future Lane, NextGen City', 'email' => 'support@futuretech.com'],
            ['id' => 4, 'name' => 'Digital Labs', 'location' => '101 Digital Avenue, Cyber City', 'email' => 'lab@digitallabs.com'],
            ['id' => 5, 'name' => 'CodeBase', 'location' => '202 Code Street, DevTown', 'email' => 'hello@codebase.com'],
        ]);
    }
}
