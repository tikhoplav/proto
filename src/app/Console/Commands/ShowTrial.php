<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Console\Command;

class ShowTrial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:trial
        {--from= : Start date of balance calculation}
        {--to= : End date of balance calculation}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $accounts = Account::trialBalance(
            $this->option('from'),
            $this->option('to')
        )->get();

        $format = function ($num) {
            return $num
                ? number_format($num, 2, '.', ' ')
                : '';
        };

        $before_debit = $format($accounts->sum('before_debit'));
        $before_credit = $format($accounts->sum('before_credit'));
        $during_debit = $format($accounts->sum('during_debit'));
        $during_credit = $format($accounts->sum('during_credit'));
        $result_debit = $format($accounts->sum('result_debit'));
        $result_credit = $format($accounts->sum('result_credit'));

        $accounts = $accounts->map(function ($item) use ($format) {
            $before_debit = $item->before_debit;
            $before_credit = $item->before_credit;

            $before_min = min($before_debit, $before_credit);
            $before_debit = $before_debit - $before_min ?: '';
            $before_credit = $before_credit - $before_min ?: '';

            $during_debit = $item->during_debit;
            $during_credit = $item->during_credit;

            $result_debit = $item->result_debit;
            $result_credit = $item->result_credit;
            
            $result_min = min($result_debit, $result_credit);
            $result_debit = $result_debit - $result_min ?: '';
            $result_credit = $result_credit - $result_min ?: '';

            return [
                'id' => $item->id,
                'before_debit' => $format($before_debit),
                'before_credit' => $format($before_credit),
                'during_debit' => $format($during_debit),
                'during_credit' => $format($during_credit),
                'result_debit' => $format($result_debit),
                'result_credit' => $format($result_credit),
            ];
        });

        $this->table([
            'Код',
            'дебит на начало',
            'кредит на начало',
            'дебит обороты',
            'кредит обороты',
            'дебит на конец',
            'кредит на конец',
        ], [...$accounts->all(),
            [
                '----',
                '----',
                '----',
                '----',
                '----',
                '----',
                '----',
            ],
            [
                'Итого:',
                $before_debit,
                $before_credit,
                $during_debit,
                $during_credit,
                $result_debit,
                $result_credit,
            ],
        ]);
    }
}
