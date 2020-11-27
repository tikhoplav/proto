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
        // Раздел I. Внеоборотные активы.

        Account::firstOrCreate(['id' => '01'], [
        	'ledge_id' => 1,
        	'name' => 'Основные средства',
        ]);
        Account::firstOrCreate(['id' => '02'], [
        	'ledge_id' => 1,
        	'name' => 'Амортизация основных средств',
        ]);
        Account::firstOrCreate(['id' => '03'], [
        	'ledge_id' => 1,
        	'name' => 'Доходные вложения в материальные ценности',
        ]);
        Account::firstOrCreate(['id' => '04'], [
        	'ledge_id' => 1,
        	'name' => 'Нематериальные активы',
        ]);
        Account::firstOrCreate(['id' => '05'], [
        	'ledge_id' => 1,
        	'name' => 'Амортизация нематериальных активов',
        ]);
        Account::firstOrCreate(['id' => '07'], [
        	'ledge_id' => 1,
        	'name' => 'Оборудование к установке',
        ]);
        Account::firstOrCreate(['id' => '08'], [
        	'ledge_id' => 1,
        	'name' => 'Вложения во внеоборотные активы',
        ]);
        Account::firstOrCreate(['id' => '09'], [
        	'ledge_id' => 1,
        	'name' => 'Отложенные налоговые активы',
        ]);

        // Раздел II. Производственные запасы.

        Account::firstOrCreate(['id' => '10'], [
        	'ledge_id' => 2,
        	'name' => 'Материалы',
        ]);
        Account::firstOrCreate(['id' => '11'], [
        	'ledge_id' => 2,
        	'name' => 'Животные на выращивании и откорме',
        ]);
        Account::firstOrCreate(['id' => '14'], [
        	'ledge_id' => 2,
        	'name' => 'Резервы под снижение стоимости материальных ценностей',
        ]);
        Account::firstOrCreate(['id' => '15'], [
        	'ledge_id' => 2,
        	'name' => 'Заготовление и приобретение материальных ценностей',
        ]);
        Account::firstOrCreate(['id' => '16'], [
        	'ledge_id' => 2,
        	'name' => 'Отклонение в стоимости материальных ценностей',
        ]);
        Account::firstOrCreate(['id' => '19'], [
        	'ledge_id' => 2,
        	'name' => 'Налог на добавленную стоимость'.
        		' по приобретенным ценностям',
        ]);

        // Раздел III. Затраты на производство.

        Account::firstOrCreate(['id' => '20'], [
        	'ledge_id' => 3,
        	'name' => 'Основное производство',
        ]);
        Account::firstOrCreate(['id' => '21'], [
        	'ledge_id' => 3,
        	'name' => 'Полуфабрикаты собственного производства',
        ]);
        Account::firstOrCreate(['id' => '23'], [
        	'ledge_id' => 3,
        	'name' => 'Вспомогательные производства',
        ]);
        Account::firstOrCreate(['id' => '25'], [
        	'ledge_id' => 3,
        	'name' => 'Общепроизводственные расходы',
        ]);
        Account::firstOrCreate(['id' => '26'], [
        	'ledge_id' => 3,
        	'name' => 'Общехозяйственные расходы',
        ]);
        Account::firstOrCreate(['id' => '28'], [
        	'ledge_id' => 3,
        	'name' => 'Брак в производстве',
        ]);
        Account::firstOrCreate(['id' => '29'], [
        	'ledge_id' => 3,
        	'name' => 'Обслуживающие производства и хозяйства',
        ]);

        // Раздел IV. Готовая продукция и товары.

        Account::firstOrCreate(['id' => '40'], [
        	'ledge_id' => 4,
        	'name' => 'Выпуск продукции (работ, услуг)',
        ]);
        Account::firstOrCreate(['id' => '41'], [
        	'ledge_id' => 4,
        	'name' => 'Товары',
        ]);
        Account::firstOrCreate(['id' => '42'], [
        	'ledge_id' => 4,
        	'name' => 'Торговая наценка',
        ]);
        Account::firstOrCreate(['id' => '43'], [
        	'ledge_id' => 4,
        	'name' => 'Готовая продукция',
        ]);
        Account::firstOrCreate(['id' => '44'], [
        	'ledge_id' => 4,
        	'name' => 'Расходы на продажу',
        ]);
        Account::firstOrCreate(['id' => '45'], [
        	'ledge_id' => 4,
        	'name' => 'Товары отгруженные',
        ]);
        Account::firstOrCreate(['id' => '46'], [
        	'ledge_id' => 4,
        	'name' => 'Выполненные этапы по незавершенным работам',
        ]);

        // Раздел V. Денежные средства.

        Account::firstOrCreate(['id' => '50'], [
        	'ledge_id' => 5,
        	'name' => 'Касса',
        ]);
        Account::firstOrCreate(['id' => '51'], [
        	'ledge_id' => 5,
        	'name' => 'Расчетные счета',
        ]);
        Account::firstOrCreate(['id' => '52'], [
        	'ledge_id' => 5,
        	'name' => 'Валютные счета',
        ]);
        Account::firstOrCreate(['id' => '55'], [
        	'ledge_id' => 5,
        	'name' => 'Специальные счета в банках',
        ]);
        Account::firstOrCreate(['id' => '57'], [
        	'ledge_id' => 5,
        	'name' => 'Переводы в пути',
        ]);
        Account::firstOrCreate(['id' => '58'], [
        	'ledge_id' => 5,
        	'name' => 'Финансовые вложения',
        ]);
        Account::firstOrCreate(['id' => '59'], [
        	'ledge_id' => 5,
        	'name' => 'Резервы под обесценение финансовых вложений',
        ]);

        // Раздел VI. Расчеты.

        Account::firstOrCreate(['id' => '60'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с поставщиками и подрядчиками',
        ]);
        Account::firstOrCreate(['id' => '62'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с покупателями и заказчиками',
        ]);
        Account::firstOrCreate(['id' => '63'], [
        	'ledge_id' => 6,
        	'name' => 'Резервы по сомнительным долгам',
        ]);
        Account::firstOrCreate(['id' => '66'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты по краткосрочным кредитам и займам',
        ]);
        Account::firstOrCreate(['id' => '67'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты по долгосрочным кредитам и займам',
        ]);
        Account::firstOrCreate(['id' => '68'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты по налогам и сборам',
        ]);
        Account::firstOrCreate(['id' => '69'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты по социальному страхованию и обеспечению',
        ]);
        Account::firstOrCreate(['id' => '70'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с персоналом по оплате труда',
        ]);
        Account::firstOrCreate(['id' => '71'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с подотчетными лицами',
        ]);
        Account::firstOrCreate(['id' => '73'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с персоналом по прочим операциям',
        ]);
        Account::firstOrCreate(['id' => '75'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с учредителями',
        ]);
        Account::firstOrCreate(['id' => '76'], [
        	'ledge_id' => 6,
        	'name' => 'Расчеты с разными дебиторами и кредиторами',
        ]);
        Account::firstOrCreate(['id' => '77'], [
        	'ledge_id' => 6,
        	'name' => 'Отложенные налоговые обязательства',
        ]);
        Account::firstOrCreate(['id' => '79'], [
        	'ledge_id' => 6,
        	'name' => 'Внутрихозяйственные расчеты',
        ]);

        // Раздел VII. Капитал.

        Account::firstOrCreate(['id' => '80'], [
        	'ledge_id' => 7,
        	'name' => 'Уставной капитал',
        ]);
        Account::firstOrCreate(['id' => '81'], [
        	'ledge_id' => 7,
        	'name' => 'Собственные акции (доли)',
        ]);
        Account::firstOrCreate(['id' => '82'], [
        	'ledge_id' => 7,
        	'name' => 'Резервный капитал',
        ]);
        Account::firstOrCreate(['id' => '83'], [
        	'ledge_id' => 7,
        	'name' => 'Добавочный капитал',
        ]);
        Account::firstOrCreate(['id' => '84'], [
        	'ledge_id' => 7,
        	'name' => 'Нераспределенная прибыль (непокрытый убыток)',
        ]);
        Account::firstOrCreate(['id' => '86'], [
        	'ledge_id' => 7,
        	'name' => 'Целевое финансирование',
        ]);

        // Раздел VIII. Финансовые результаты.

        Account::firstOrCreate(['id' => '90'], [
        	'ledge_id' => 8,
        	'name' => 'Продажи',
        ]);
        Account::firstOrCreate(['id' => '91'], [
        	'ledge_id' => 8,
        	'name' => 'Прочие доходы и расходы',
        ]);
        Account::firstOrCreate(['id' => '94'], [
        	'ledge_id' => 8,
        	'name' => 'Недостачи и потери от порчи ценностей',
        ]);
        Account::firstOrCreate(['id' => '96'], [
        	'ledge_id' => 8,
        	'name' => 'Резервы предстоящих расходов',
        ]);
        Account::firstOrCreate(['id' => '97'], [
        	'ledge_id' => 8,
        	'name' => 'Расходы будущих периодов',
        ]);
        Account::firstOrCreate(['id' => '98'], [
        	'ledge_id' => 8,
        	'name' => 'Доходы будущих периодов',
        ]);
        Account::firstOrCreate(['id' => '99'], [
        	'ledge_id' => 8,
        	'name' => 'Прибыли и убытки',
        ]);

        // Забалансовые счета.

        Account::firstOrCreate(['id' => '001'], [
        	'ledge_id' => 9,
        	'name' => 'Арендованные основные средства',
        ]);
        Account::firstOrCreate(['id' => '002'], [
        	'ledge_id' => 9,
        	'name' => 'Товарно-материальные ценности,'
        		.' принятые на ответственное хранение',
        ]);
        Account::firstOrCreate(['id' => '003'], [
        	'ledge_id' => 9,
        	'name' => 'Материалы, принятые в переработку',
        ]);
        Account::firstOrCreate(['id' => '004'], [
        	'ledge_id' => 9,
        	'name' => 'Товары, принятые на комиссию',
        ]);
        Account::firstOrCreate(['id' => '005'], [
        	'ledge_id' => 9,
        	'name' => 'Оборудование, принятое для монтажа',
        ]);
        Account::firstOrCreate(['id' => '006'], [
        	'ledge_id' => 9,
        	'name' => 'Бланки строгой отчетности',
        ]);
        Account::firstOrCreate(['id' => '007'], [
        	'ledge_id' => 9,
        	'name' => 'Списанная в убыток задолженность'
        		.' неплатежеспособных дебиторов',
        ]);
        Account::firstOrCreate(['id' => '008'], [
        	'ledge_id' => 9,
        	'name' => 'Обеспечения обязательств и платежей полученные',
        ]);
        Account::firstOrCreate(['id' => '009'], [
        	'ledge_id' => 9,
        	'name' => 'Обеспечения обязательств и платежей выданные',
        ]);
        Account::firstOrCreate(['id' => '010'], [
        	'ledge_id' => 9,
        	'name' => 'Износ основных средств',
        ]);
        Account::firstOrCreate(['id' => '011'], [
        	'ledge_id' => 9,
        	'name' => 'Основные средства, сданные в аренду',
        ]);
    }
}
