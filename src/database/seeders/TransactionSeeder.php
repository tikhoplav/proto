<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()
            ->income()
            ->count(10)
            ->create([
            	'amount' => rand(5, 10) * 2000,
            ])
            ->each(function ($trans) {
                Transaction::factory()->create([
                    'datetime' => $trans->datetime,
                    'amount' => $trans->amount,
                    'debit_id' => $trans->credit_id,
                    'credit_id' => '90',
                ]);
            });

        Transaction::factory()
            ->expense()
            ->count(990)
            ->create()
            ->each(function ($trans) {
                Transaction::factory()->create([
                    'datetime' => $trans->datetime,
                    'amount' => $trans->amount,
                    'debit_id' => $trans->credit_id,
                    'credit_id' => '50',
                ]);
            });
    }
}
