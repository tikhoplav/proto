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
                'name' => 'Imperial',
                'desc' => '',
                'parent_id' => '23.1.1',
            ],
            [
                'id' => '23.1.1.2',
                'name' => 'Frankfurt',
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
                'id' => '23.1.2.1',
                'name' => 'tikhoplav.com',
                'desc' => '',
                'parent_id' => '23.1.2',
            ],
            [
                'id' => '23.1.2.2',
                'name' => 'psykespb.com',
                'desc' => '',
                'parent_id' => '23.1.2',
            ],
            [
                'id' => '23.2',
                'name' => 'Интернет',
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
                'id' => '60.1',
                'name' => 'Beget',
                'desc' => '',
                'parent_id' => '60',
            ],
            [
                'id' => '60.2',
                'name' => 'Reg.ru',
                'desc' => '',
                'parent_id' => '60',
            ],
            [
                'id' => '62',
                'name' => 'Клиенты и заказчики',
                'desc' => '',
                'parent_id' => null,
            ],
            [
                'id' => '62.1',
                'name' => 'JW',
                'desc' => '',
                'parent_id' => '62',
            ],
            [
                'id' => '62.2',
                'name' => 'Quest Pair',
                'desc' => '',
                'parent_id' => '62',
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
