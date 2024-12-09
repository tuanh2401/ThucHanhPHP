<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['id' => 1, 'title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'publication_year' => 1925, 'genre' => 'Novel', 'library_id' => 1],
            ['id' => 2, 'title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'publication_year' => 1960, 'genre' => 'Novel', 'library_id' => 2],
            ['id' => 3, 'title' => '1984', 'author' => 'George Orwell', 'publication_year' => 1949, 'genre' => 'Dystopian', 'library_id' => 3],
            ['id' => 4, 'title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'publication_year' => 1813, 'genre' => 'Romantic', 'library_id' => 4],
            ['id' => 5, 'title' => 'Moby-Dick', 'author' => 'Herman Melville', 'publication_year' => 1851, 'genre' => 'Adventure', 'library_id' => 5],
        ]);
    }
}
