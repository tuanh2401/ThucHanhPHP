<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Hardware_devicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hardware_devices')->insert([
            ['id' => 1, 'device_name' => 'Laptop HP', 'type' => 'Laptop', 'status' => true, 'center_id' => 1],
            ['id' => 2, 'device_name' => 'Printer Canon', 'type' => 'Printer', 'status' => true, 'center_id' => 1],
            ['id' => 3, 'device_name' => 'Projector Epson', 'type' => 'Projector', 'status' => false, 'center_id' => 2],
            ['id' => 4, 'device_name' => 'Desktop Dell', 'type' => 'Desktop', 'status' => true, 'center_id' => 2],
            ['id' => 5, 'device_name' => 'Scanner Brother', 'type' => 'Scanner', 'status' => false, 'center_id' => 3],
        ]);
    }
}
