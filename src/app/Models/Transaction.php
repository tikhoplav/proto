<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'debit_id',
    	'credit_id',
    	'amount',
    	'desc',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'desc' => '',
    ];

    /**
     * Get debit account of the transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function debit()
    {
    	return $this->belongsTo(Account::class);
    }

    /**
     * Get debit account of the transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit()
    {
    	return $this->belongsTo(Account::class);
    }

    /**
     * Scopes a query to include transaction, that was
     * created at specified date and after
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $date
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAfter($query, $date)
    {
        return $query->where('datetime', '>=', $date);
    }

    /**
     * Scope a query to include transactions, that was
     * created before the specified date
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $date
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBefore($query, $date)
    {
        return $query->where('datetime', '<', $date);
    }

    /**
     * Modifies a query to split each resulted transaction,
     * in to two rows by debit and credit
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBalance($query)
    {
        return DB::table('balance')
        ->withExpression('t', $query)
        ->fromSub(function ($q) {
            $q->fromSub(function ($q) {
                $s = 'debit_id as account_id, amount as debit, 0 as credit';
                $q->from('t')->selectRaw($s);
            }, 'debits')->unionAll(function ($q) {
                $s = 'credit_id as account_id, 0 as debit, amount as credit';
                $q->from('t')->selectRaw($s);
            });
        }, 'balance')
        ->selectRaw("account_id, sum(debit) as debit, sum(credit) as credit")
        ->groupBy('account_id');
    }
}
