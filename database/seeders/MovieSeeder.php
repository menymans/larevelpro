<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Movie::create([
            'title' => 'Inception',
            'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology.',
            'genre' => 'Science Fiction',
            'director' => 'Christopher Nolan',
            'release_date' => '2010-07-16',
            'poster' => 'https://example.com/inception.jpg',
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'description' => 'When the menace known as The Joker emerges, Batman must accept one of the greatest psychological and physical tests.',
            'genre' => 'Action',
            'director' => 'Christopher Nolan',
            'release_date' => '2008-07-18',
            'poster' => 'https://example.com/darkknight.jpg',
        ]);
        // Agrega más películas según lo necesites
    }
}
