<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'id' => 1,
                'computer_id' => 1, // Liên kết với 'computers' bảng
                'reported_by' => 'Alice Johnson',
                'reported_date' => now(),
                'description' => 'The computer is not starting properly.',
                'urgency' => 'High',
                'status' => 'Open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'computer_id' => 2, // Liên kết với 'computers' bảng
                'reported_by' => 'Bob Smith',
                'reported_date' => now()->subDays(2),
                'description' => 'Operating system keeps crashing.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'computer_id' => 3, // Liên kết với 'computers' bảng
                'reported_by' => 'Carol Davis',
                'reported_date' => now()->subDays(5),
                'description' => 'Screen flickers intermittently.',
                'urgency' => 'Low',
                'status' => 'Resolved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
