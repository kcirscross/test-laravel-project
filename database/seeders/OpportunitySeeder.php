<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Opportunity;
use Faker\Factory as Faker;


class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 opportunity records
        for ($i = 0; $i < 10; $i++) {
            Opportunity::create([
                'transaction_name' => $faker->company(),
                'phase' => $faker->randomElement(['Phase 1', 'Phase 2', 'Phase 3', 'Phase 4']),
                'organization' => $faker->company(),
                'contact' => $faker->name(),
                'responsible' => $faker->name(),
                'value' => $faker->numberBetween(1000, 50000),
                'date_closing' => $faker->date(),
                'telephone' => $faker->phoneNumber(),
                'email' => $faker->email(),
            ]);
        }
    }
}
