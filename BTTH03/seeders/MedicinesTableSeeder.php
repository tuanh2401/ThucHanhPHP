<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'medicine_id' => 1,
                'name' => 'Paracetamol 500mg',
                'brand' => 'Panadol',
                'dosage' => '500mg',
                'form' => 'Tablet',
                'price' => 2.50,
                'stock' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 2,
                'name' => 'Amoxicillin 250mg',
                'brand' => 'Augmentin',
                'dosage' => '250mg',
                'form' => 'Capsule',
                'price' => 10.00,
                'stock' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 3,
                'name' => 'Ibuprofen 200mg',
                'brand' => 'Advil',
                'dosage' => '200mg',
                'form' => 'Tablet',
                'price' => 5.00,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
