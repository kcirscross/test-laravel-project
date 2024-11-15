<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'title' => $faker->sentence(3),
                'due_date' => $faker->date(),
                'email' => $faker->unique()->safeEmail(),
                'opportunity' => $faker->numberBetween(1, 10),
                'contact' => $faker->numberBetween(1, 10),
                'manager' => $faker->numberBetween(1, 10),
                'accomplished' => $faker->boolean(),
                'status' => $faker->randomElement(['pending', 'in_progress', 'completed']),
            ]);
        }
    }
}
