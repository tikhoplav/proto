<?php

namespace App\Http\Controllers\Operations;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateTransaction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $valid = $request->validate([
            'dr' => 'required|exists:accounts,id',
            'cr' => 'required|exists:accounts,id',
            'amount' => 'required|digits_between:1,16',
            'description' => 'nullable|string',
        ]);

        return Transaction::create($valid)->toJson(JSON_UNESCAPED_UNICODE);
    }
}
