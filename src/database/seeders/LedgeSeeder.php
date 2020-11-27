<?php

namespace Database\Seeders;

use App\Models\Ledge;
use Illuminate\Database\Seeder;

class LedgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Ledge::truncate();

    	Ledge::create([
            'name' => 'Активы',
        ]);
        Ledge::create([
            'name' => 'Запасы',
        ]);
        Ledge::create([
            'name' => 'Затраты',
        ]);
        Ledge::create([
            'name' => 'Инвестиции',
        ]);
        Ledge::create([
            'name' => 'Денежные средства',
        ]);
        Ledge::create([
            'name' => 'Расчеты',
        ]);
        Ledge::create([
            'name' => 'Кредиты и займы',
        ]);
        Ledge::create([
            'name' => 'Финансовые результаты',
        ]);
        Ledge::create([
            'name' => 'Забалансовые счета',
        ]);
    }
}
