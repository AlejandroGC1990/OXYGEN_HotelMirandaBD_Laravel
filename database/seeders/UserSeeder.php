<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder{
    
    public function run()
    {
        $users = [
            [
                'name' => 'Wanillo kokunero',
                'email' => 'wanillo@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Kike montilla',
                'email' => 'kike@gmail.com',
                'password' => Hash::make('12345678'),

            ],
            [
                'name' => 'david',
                'email' => 'david@gmail.com',
                'password' => Hash::make('12345678'),

            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}