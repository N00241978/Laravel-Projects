<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'phone' => $faker->phoneNumber(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'address' => $faker->address(),
                'image' => 'banker' . $faker->numberBetween(1, 10) . '.jpg'
            ],
            [
                'name' => 'angus',
                'email' => 'anguswalker007@gmail.com',
                'phone' => $faker->phoneNumber(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'address' => $faker->address(),
                'image' => 'banker' . $faker->numberBetween(1, 10) . '.jpg'
            ]
        ];

        for ($i = 0; $i < 50; $i++) {
            $users[] = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'image' => 'banker' . $faker->numberBetween(1, 10) . '.jpg', // concatination (sticking shit together)
                'role' => "customer",
                'password' => Hash::make('password'),
            ];
        }

        User::insert($users);

    }
}
