<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computers')->insert([
            [
                'id' => 1,
                'computer_name' => 'Office-PC1',
                'model' => 'Dell Optiplex 7080',
                'operating_system' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => 16,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'computer_name' => 'Office-PC2',
                'model' => 'HP EliteDesk 800',
                'operating_system' => 'Windows 11',
                'processor' => 'Intel Core i7',
                'memory' => 32,
                'available' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'computer_name' => 'Lab-PC1',
                'model' => 'Apple iMac 2021',
                'operating_system' => 'macOS Monterey',
                'processor' => 'Apple M1',
                'memory' => 8,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
