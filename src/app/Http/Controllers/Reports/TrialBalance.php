<?php

namespace App\Http\Controllers\Reports;

use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrialBalance extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $after = $request->input('after', null);
        $before = $request->input('before', now()->toDateString());
        $accounts = Account::balance($after, $before)->get();

        if ($request->has('subtracted')) {
            $accounts->map(function ($account) {
                $debit = $account->debit;
                $credit = $account->credit;

                $min = min($debit, $credit);
                $account->debit = $account->debit - $min;
                $account->credit = $account->credit - $min;

                return $account;
            });
        }

        $debit = $accounts->reduce(function ($sum, $acc) {
            return $sum + $acc->debit;
        });

        $credit = $accounts->reduce(function ($sum, $acc) {
            return $sum + $acc->credit;
        });

        return response()->json([
            'debit' => $debit,
            'credit' => $credit,
            'accounts' => $accounts,
        ]);
    }
}
