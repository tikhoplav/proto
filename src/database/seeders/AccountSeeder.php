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
        Account::upsert([

        	// Book I: Actives.

        	[
        		'id' => '01',
        		'name' => 'Недвижимость',
				'desc' => '',
        	],
        	[
        		'id' => '02',
        		'name' => 'Транспортные средства',
				'desc' => '',
        	],
        	[
        		'id' => '03',
        		'name' => 'Мебель и декор',
				'desc' => '',
        	],
        	[
        		'id' => '04',
        		'name' => 'Нематериальные активы',
				'desc' => '',
        	],
        	[
        		'id' => '05',
        		'name' => 'Девайсы и бытовая техника',
				'desc' => '',
        	],
        	[
        		'id' => '06',
        		'name' => 'Одежда и аксесуары',
				'desc' => '',
        	],
        	[
        		'id' => '10',
        		'name' => 'Материалы',
				'desc' => '',
        	],

        	// Book II: Expences.

        	[
        		'id' => '20',
        		'name' => 'Жилье и коммунальные услуги',
				'desc' => '',
        	],
        	[
        		'id' => '21',
        		'name' => 'Медицина',
				'desc' => '',
        	],
        	[
        		'id' => '22',
        		'name' => 'Продукты питания',
				'desc' => '',
        	],
        	[
        		'id' => '23',
        		'name' => 'Услуги',
				'desc' => '',
        	],
        	[
        		'id' => '24',
        		'name' => 'Автомобильные расходы',
				'desc' => '',
        	],
        	[
        		'id' => '25',
        		'name' => 'Образование',
				'desc' => '',
        	],
        	[
        		'id' => '26',
        		'name' => 'Туризм',
				'desc' => '',
        	],
        	[
        		'id' => '27',
        		'name' => 'Досуг',
				'desc' => '',
        	],
        	[
        		'id' => '28',
        		'name' => 'Расходы на ребенка',
				'desc' => '',
        	],
        	[
        		'id' => '29',
        		'name' => 'Прочие расходы',
				'desc' => '',
        	],

        	// Book III: Funds.

        	[
        		'id' => '50',
        		'name' => 'Наличные средства',
				'desc' => '',
        	],
        	[
        		'id' => '55',
        		'name' => 'Дебитные карты',
				'desc' => '',
        	],
        	[
        		'id' => '58',
        		'name' => 'Инвестиции',
				'desc' => '',
        	],

        	// Book IV: Accounting.

        	[
        		'id' => '60',
        		'name' => 'Поставщики и подрядчики',
				'desc' => '',
        	],
        	[
        		'id' => '62',
        		'name' => 'Покупатели и заказчики',
				'desc' => '',
        	],

        	// Book V: Credits and Loans

        	[
        		'id' => '76',
        		'name' => 'Прочие кредиторы и дебиторы',
				'desc' => '',
        	],

        	// Book IV: Financial results

        	[
        		'id' => '90',
        		'name' => 'Доходы и расходы',
				'desc' => '',
        	],
        	[
        		'id' => '99',
        		'name' => 'Прибыли и убытки',
				'desc' => '',
        	],

        ], ['id']);
    }
}
