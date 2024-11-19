<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\MySqlConnection;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $count=20): void
    {
        $faker = FakerFactory::create('es_ES');
        $bookings = [];

       // $roomNum = DB::selectRaw("SELECT COUNT(*) FROM rooms");
        $roomAll = Room::all();
        
        for ($i = 0; $i<$count; $i++){
            $bookings[] = [
                
                'guest' => $faker->name,
                'picture' => $faker->imageUrl(640, 480, 'people', true),
                'order_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'check_in' => Carbon::parse($faker->date())->addDays(rand(1, 10))->toDateString(),
                'check_out' => Carbon::parse($faker->date())->addDays(rand(11, 20))->toDateString(),
                'discount' => $faker->randomFloat(2, 0, 50),
                'notes' =>  implode(' ', $faker->paragraphs(2)),
                'room_id' => $roomAll->random()->id,
                'status' => $faker->randomElement(['Booked','Pending','Refund','Cancelled']),
                
            ];
        }
        Booking::insert($bookings);
    }
}