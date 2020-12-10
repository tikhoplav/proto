<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;

class ShowAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:accounts';

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
        $accounts = Account::root()->descendant()->orderBy('id')->get();
        $accounts = $accounts->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => str_repeat('-', $item->depth) . $item->name,
            ];
        });

        $this->table([
            'Код', 'Наименование счета',
        ], $accounts);
    }
}
