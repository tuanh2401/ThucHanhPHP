<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $computer_id = DB::table('computers')->inRandomOrder()->first()->id;

            if (!$computer_id) {
                continue;
            }

            DB::table('issues')->insert([
                'computer_id' => $computer_id, 
                'reported_by' => $faker->name, 
                'reported_date' => $faker->dateTimeThisMonth(), 
                'description' => $faker->paragraph, 
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), 
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
