<?php

namespace App\Http\Controllers\Registries;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationsChart extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $transactions = Transaction::query()
            ->interval(
                $request->input('date_from'),
                $request->input('date_to')
            )
            ->get()
        ;

        return $transactions->toJson(JSON_UNESCAPED_UNICODE);
    }
}
