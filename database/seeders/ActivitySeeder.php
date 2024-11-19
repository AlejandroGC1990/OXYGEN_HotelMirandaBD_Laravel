<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;  
use Faker\Factory as FakerFactory;
use App\Models\User;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $faker = FakerFactory::create('es_ES');

        $users = User::all();

        $activities = [];

        for ($i = 0; $i<20; $i++){
            $activities[] = [
                'type' => $faker->randomElement(['surf', 'windsurf', 'kayak', 'atv', 'hot air balloon']),
                'user_id' => $users->random()->id,
                'datetime' => $faker->dateTimeBetween('-1 year', 'now'),
                'paid' => $faker->boolean(70),
                'notes' => $faker->text(100),
                'satisfaction' => $faker->numberBetween(1, 5),

            ];
        }
        Activity::insert($activities);
    }
}