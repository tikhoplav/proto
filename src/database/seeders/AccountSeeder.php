<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Раздел I. Активы.

        Account::firstOrCreate(['id' => '01'], [
        	'ledger_id' => 1,
        	'name' => 'Недвижимость',
        ]);
        Account::firstOrCreate(['id' => '02'], [
        	'ledger_id' => 1,
        	'name' => 'Автомобиль',
        ]);
        Account::firstOrCreate(['id' => '03'], [
        	'ledger_id' => 1,
        	'name' => 'Мебель',
        ]);
        Account::firstOrCreate(['id' => '04'], [
        	'ledger_id' => 1,
        	'name' => 'Нематериальные активы',
        ]);
        Account::firstOrCreate(['id' => '05'], [
        	'ledger_id' => 1,
        	'name' => 'Девайсы и бытовая техника',
        ]);
        Account::firstOrCreate(['id' => '06'], [
        	'ledger_id' => 1,
        	'name' => 'Одежда',
        ]);
        Account::firstOrCreate(['id' => '10'], [
        	'ledger_id' => 1,
        	'name' => 'Материалы',
        ]);

        // Раздел II. Затраты.

        Account::firstOrCreate(['id' => '20'], [
        	'ledger_id' => 2,
        	'name' => 'Жилье и коммунальные услуги',
        ]);
        Account::firstOrCreate(['id' => '21'], [
        	'ledger_id' => 2,
        	'name' => 'Медицина',
        ]);
        Account::firstOrCreate(['id' => '22'], [
        	'ledger_id' => 2,
        	'name' => 'Продукты питания',
        ]);
        Account::firstOrCreate(['id' => '23'], [
        	'ledger_id' => 2,
        	'name' => 'Услуги связи',
        ]);
        Account::firstOrCreate(['id' => '24'], [
        	'ledger_id' => 2,
        	'name' => 'Автомобильные расходы',
        ]);
        Account::firstOrCreate(['id' => '25'], [
        	'ledger_id' => 2,
        	'name' => 'Образование',
        ]);
        Account::firstOrCreate(['id' => '26'], [
            'ledger_id' => 2,
            'name' => 'Туризм',
        ]);
        Account::firstOrCreate(['id' => '27'], [
            'ledger_id' => 2,
            'name' => 'Досуг',
        ]);
        Account::firstOrCreate(['id' => '28'], [
            'ledger_id' => 2,
            'name' => 'Бытовые расходы',
        ]);
        Account::firstOrCreate(['id' => '29'], [
            'ledger_id' => 2,
            'name' => 'Прочие расходы',
        ]);

        // Раздел III. Инвестиции.

        Account::firstOrCreate(['id' => '30'], [
        	'ledger_id' => 3,
        	'name' => 'Другие инвестиции',
        ]);

        // Раздел IV. Денежные средства.

        Account::firstOrCreate(['id' => '50'], [
        	'ledger_id' => 4,
        	'name' => 'Наличные средства',
        ]);
        Account::firstOrCreate(['id' => '55'], [
        	'ledger_id' => 4,
        	'name' => 'Дебитные карты',
        ]);

        // Раздел V. Расчеты.

        Account::firstOrCreate(['id' => '60'], [
        	'ledger_id' => 5,
        	'name' => 'Поставщики и подрядчики',
        ]);
        Account::firstOrCreate(['id' => '62'], [
        	'ledger_id' => 5,
        	'name' => 'Покупатели и заказчики',
        ]);

        // Раздел VI. Кредиты и займы.

        Account::firstOrCreate(['id' => '76'], [
        	'ledger_id' => 6,
        	'name' => 'Прочие кредиторы и дебиторы',
        ]);

        // Раздел VII. Финансовые результаты.

        Account::firstOrCreate(['id' => '90'], [
        	'ledger_id' => 7,
        	'name' => 'Доходы и расходы',
        ]);
        Account::firstOrCreate(['id' => '99'], [
            'ledger_id' => 7,
            'name' => 'Прибыли и убытки',
        ]);
    }
}
