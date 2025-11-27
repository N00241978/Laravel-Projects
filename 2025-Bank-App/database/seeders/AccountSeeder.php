<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account;
use App\Models\User;

use Faker\Factory as Faker;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $account_status = ['Open', 'Closed', 'Frozen'];

        for ($i = 0; $i < 50; $i++) {
            $account = Account::create([
                'balance' => $faker->numberBetween(-1000, 100000),
                'date_opened' => $faker->dateTime(),
                'account_status' => $faker->randomElement($account_status)
            ]);

            $accountUsers = User::inRandomOrder()->take($faker->numberBetween(1, 3))->pluck('id');

            $account->users()->attach($accountUsers);
        }
    }
}
