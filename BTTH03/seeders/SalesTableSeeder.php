<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'sale_id' => 1,
                'medicine_id' => 1, // Liên kết với thuốc có ID 1 trong bảng medicines
                'quantity' => 10,
                'sale_date' => now(),
                'customer_phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sale_id' => 2,
                'medicine_id' => 2, // Liên kết với thuốc có ID 2
                'quantity' => 5,
                'sale_date' => now()->subDays(1),
                'customer_phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sale_id' => 3,
                'medicine_id' => 3, // Liên kết với thuốc có ID 3
                'quantity' => 8,
                'sale_date' => now()->subDays(3),
                'customer_phone' => '0912345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
