<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account;

use Faker\Factory as Faker;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $accounts = [];
        $account_status = ['Open', 'Closed', 'Frozen'];

        for ($i = 0; $i < 50; $i++) {
            $accounts[] = [
                'balance' => $faker->numberBetween(-1000, 100000),
                'date_opened' => $faker->dateTime(),
                'account_status' => $faker->randomElement($account_status)
            ];
        }

        Account::insert($accounts);
    }
}
