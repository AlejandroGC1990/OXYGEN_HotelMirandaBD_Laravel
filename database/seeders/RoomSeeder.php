<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    
  public function run(int $count = 20): void{$faker = Faker::create();$rooms = [];
      $letters = config('params.room_floor_letters');
      $minNumber = config('params.room_floor_numbers.min');
      $maxNumber = config('params.room_floor_numbers.max');
      foreach (range(1, $count) as $index) 
      {
        $rooms[] = [
        
        'room_type' => $faker->randomElement(['Normal','Deluxe A', 'Deluxe B', 'Deluxe C ', 'Duplex','Suite']),
        'number' => $faker->numberBetween(0, 999),
        'picture' => $faker->imageUrl(640, 480, 'room', true),
        'bed_type' => $faker->randomElement(['Single bed','Double bed','Double Superior','Suite']),
        'room_floor' => $faker->randomElement(['A1','A2','A3','B1','B2','B3']),
              
        'facilities' => json_encode($faker->randomElements(['Wifi','Shower'])),
                
        'rate' => $faker->randomFloat(2, 50, 500),
        'discount' => $faker->randomFloat(2, 0, 90),
        'status' => $faker->randomElement(['Available','Booked'])
        ];
    }Room::insert($rooms);}
}