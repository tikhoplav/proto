<?php

namespace Database\Seeders;

use App\Models\Ledger;
use Illuminate\Database\Seeder;

class LedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Ledger::truncate();

    	Ledger::create([
            'name' => 'Активы',
        ]);
        Ledger::create([
            'name' => 'Затраты',
        ]);
        Ledger::create([
            'name' => 'Инвестиции',
        ]);
        Ledger::create([
            'name' => 'Денежные средства',
        ]);
        Ledger::create([
            'name' => 'Расчеты',
        ]);
        Ledger::create([
            'name' => 'Кредиты и займы',
        ]);
        Ledger::create([
            'name' => 'Финансовые результаты',
        ]);
    }
}
