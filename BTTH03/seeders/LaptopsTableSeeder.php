<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laptops')->insert([
            ['id' => 1, 'brand' => 'Dell', 'model' => 'XPS 13', 'specifications' => 'Intel Core i7, 16GB RAM, 512GB SSD', 'rental_status' => true, 'renter_id' => 1],
            ['id' => 2, 'brand' => 'Apple', 'model' => 'MacBook Air', 'specifications' => 'M1 Chip, 8GB RAM, 256GB SSD', 'rental_status' => false, 'renter_id' => 2],
            ['id' => 3, 'brand' => 'HP', 'model' => 'Spectre x360', 'specifications' => 'Intel Core i5, 8GB RAM, 256GB SSD', 'rental_status' => true, 'renter_id' => 3],
            ['id' => 4, 'brand' => 'Asus', 'model' => 'ZenBook 14', 'specifications' => 'AMD Ryzen 5, 8GB RAM, 256GB SSD', 'rental_status' => false, 'renter_id' => 4],
            ['id' => 5, 'brand' => 'Lenovo', 'model' => 'ThinkPad X1 Carbon', 'specifications' => 'Intel Core i7, 16GB RAM, 1TB SSD', 'rental_status' => true, 'renter_id' => 5],
        ]);
    }
}
