<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cinemas')->insert([
            ['id' => 1, 'name' => 'CineMax', 'location' => '123 Main St, New York', 'total_seats' => 150],
            ['id' => 2, 'name' => 'FilmHouse', 'location' => '456 Elm St, Los Angeles', 'total_seats' => 200],
            ['id' => 3, 'name' => 'MovieWorld', 'location' => '789 Pine St, Chicago', 'total_seats' => 250],
            ['id' => 4, 'name' => 'ScreenTime', 'location' => '101 Maple St, Houston', 'total_seats' => 300],
            ['id' => 5, 'name' => 'PicturePalace', 'location' => '202 Birch St, Philadelphia', 'total_seats' => 350],
        ]);
    }
}
