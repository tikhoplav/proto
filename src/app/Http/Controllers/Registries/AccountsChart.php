<?php

namespace App\Http\Controllers\Registries;

use App\Models\Ledger;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsChart extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ledgers = Ledger::with('accounts')->get();

        return $ledgers->toJson(JSON_UNESCAPED_UNICODE);
    }
}
