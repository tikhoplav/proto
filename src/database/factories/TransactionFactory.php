<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'datetime' => $this->faker->dateTimeBetween('-90 days', 'now'),
            'amount' => rand(1, 100),
        ];
    }

    public function income()
    {
        return $this->state(function () {
            return [
                'debit_id' => 50,
                'credit_id' => Account::where('id', '62')
                    ->descendant()
                    ->inRandomOrder()
                    ->first()
                    ->id,
            ];
        });
    }

    public function expense()
    {
        return $this->state(function () {
            return [
                'debit_id' => Account::where('id', '23')
                    ->descendant()
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'credit_id' => Account::where('id', '62')
                    ->descendant()
                    ->inRandomOrder()
                    ->first()
                    ->id,
            ];
        });
    }
}
