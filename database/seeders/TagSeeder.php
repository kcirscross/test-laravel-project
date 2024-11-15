<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tags = [
            ['name' => 'Technology', 'color' => '#FF5733'],
            ['name' => 'Education', 'color' => '#33FF57'],
            ['name' => 'Healthcare', 'color' => '#5733FF'],
            ['name' => 'Finance', 'color' => '#FFD700'],
            ['name' => 'Travel', 'color' => '#00FFFF'],
            ['name' => 'Entertainment', 'color' => '#FF00FF'],
            ['name' => 'Food', 'color' => '#800000'],
            ['name' => 'Real Estate', 'color' => '#008080'],
            ['name' => 'Fashion', 'color' => '#FF4500'],
            ['name' => 'Sports', 'color' => '#32CD32'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
