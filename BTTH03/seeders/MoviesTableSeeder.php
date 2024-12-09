<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            ['id' => 1, 'title' => 'Inception', 'director' => 'Christopher Nolan', 'release_date' => '2010-07-16 00:00:00', 'duration' => 148, 'cinema_id' => 1],
            ['id' => 2, 'title' => 'The Dark Knight', 'director' => 'Christopher Nolan', 'release_date' => '2008-07-18 00:00:00', 'duration' => 152, 'cinema_id' => 2],
            ['id' => 3, 'title' => 'Titanic', 'director' => 'James Cameron', 'release_date' => '1997-12-19 00:00:00', 'duration' => 195, 'cinema_id' => 3],
            ['id' => 4, 'title' => 'The Shawshank Redemption', 'director' => 'Frank Darabont', 'release_date' => '1994-09-23 00:00:00', 'duration' => 142, 'cinema_id' => 4],
            ['id' => 5, 'title' => 'Pulp Fiction', 'director' => 'Quentin Tarantino', 'release_date' => '1994-10-14 00:00:00', 'duration' => 154, 'cinema_id' => 5],
        ]);
    }
}
