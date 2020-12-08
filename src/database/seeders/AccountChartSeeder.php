<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::upsert([
            [
                'id' => '01',
                'name' => 'Недвижимость',
				'desc' => '',
                'parent_id' => null,
            ],
            [
                'id' => '23',
                'name' => 'Услуги',
				'desc' => '',
                'parent_id' => null,
            ],
            [
                'id' => '23.1',
                'name' => 'Бизнес сервисы',
				'desc' => '',
                'parent_id' => '23',
            ],
            [
                'id' => '23.1.1',
                'name' => 'VPS',
				'desc' => '',
                'parent_id' => '23.1',
            ],
            [
                'id' => '23.1.1.1',
                'name' => 'Impersonal Ian',
				'desc' => '',
                'parent_id' => '23.1.1',
            ],
            [
                'id' => '23.1.1.2',
                'name' => 'PsykeServ',
				'desc' => '',
                'parent_id' => '23.1.1',
            ],
            [
                'id' => '23.1.2',
                'name' => 'Домены',
				'desc' => '',
                'parent_id' => '23.1',
            ],
            [
                'id' => '23.2',
                'name' => 'Интернет',
				'desc' => '',
                'parent_id' => '23',
            ],
            [
                'id' => '23.3',
                'name' => 'Телефония',
				'desc' => '',
                'parent_id' => '23',
            ],
            [
                'id' => '50',
                'name' => 'Касса',
				'desc' => '',
                'parent_id' => null,
            ],
            [
                'id' => '60',
                'name' => 'Поставщики и подрядчики',
				'desc' => '',
                'parent_id' => null,
            ],
            [
                'id' => '90',
                'name' => 'Доходы и расходы',
				'desc' => '',
                'parent_id' => null,
            ],
        ], ['id']);
    }
}
