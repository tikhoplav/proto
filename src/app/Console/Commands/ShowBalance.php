<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Console\Command;

class ShowBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:balance
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
        $query = Transaction::query()
        ->when($this->option('from'), function ($query) {
            return $query->after($this->option('from'));
        })
        ->when($this->option('to'), function ($query) {
            return $query->before($this->option('to'));
        });

        $accounts = Account::balance($query)->get();

        $debit = $accounts->sum('debit');
        $credit = $accounts->sum('credit');

        $accounts = $accounts->map(function ($item) {
            $min = min($item->debit, $item->credit);
            $format = function ($num) use ($min) {
                return $num - $min
                    ? number_format($num - $min, 2, '.', ' ')
                    : '';
            };

            return [
                'id' => $item->id,
                'name' => str_repeat('-', $item->depth) . $item->name,
                'debit' => $format($item->debit),
                'credit' => $format($item->credit),
            ];
        });

        $this->table([
            'Код', 'Наименование счета', 'дебит', 'кредит',
        ], [...$accounts->all(),
            [
                '----',
                '----',
                '----',
                '----',
            ],
            [
                '',
                'Итого:',
                number_format($debit, 2, '.', ' '),
                number_format($credit, 2, '.', ' '),
            ],
        ]);
    }
}
