<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $customers = [];

        for ($i = 0; $i < 50; $i++) {
            $customers[] = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'image' => 'banker' . $faker->numberBetween(1, 10) . '.jpg' // concatination (sticking shit together)
            ];
        }

        DB::table('customers')->insert($customers);
    }
}