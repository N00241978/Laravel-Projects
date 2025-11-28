<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

use Faker\Factory as Faker;


class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = Account::all();

        $faker = Faker::create();

        foreach ($accounts as $account) {
            $transactionAmount = $faker->numberBetween(-1000, 1000);

            $transactions = [
                [
                    'title' => $faker->words(3, true),
                    'amount' => $transactionAmount,
                    'old_balance' => $account->balance,
                    'new_balance' => $account->balance + $transactionAmount
                ]
            ];

            for ($i = 0; $i < 10; $i++) {
                $transactionAmount = $faker->numberBetween(-1000, 1000);

                $transactions[] = [
                    'title' => $faker->words(3, true),
                    'amount' => $transactionAmount,
                    'old_balance' => end($transactions)['new_balance'],
                    'new_balance' => end($transactions)['new_balance'] + $transactionAmount
                ];
            }

            $account->transactions()->createMany($transactions);

            $account->update(['balance' => end($transactions)['new_balance']]);

        }
    }
}