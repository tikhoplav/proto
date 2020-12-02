<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	/**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
    protected $fillable = ['id', 'name'];

    /**
     * Get ledger that the account belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ledger()
    {
    	return $this->belongsTo(Ledger::class);
    }

    /**
     * Get transactions by debit of the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function debits()
    {
        return $this->hasMany(Transaction::class, 'dr');
    }

    /**
     * Get transactions by credit of the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function credits()
    {
        return $this->hasMany(Transaction::class, 'cr');
    }

    /**
     * Scopes a query to attach a balance to each account,
     * based on the transaction calculation of the given date interval.
     * Omitted limit will be ignored from scoping.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $after
     * @param string|null $before
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBalance(
        Builder $query,
        string $after = null,
        string $before = null
    ): Builder {
        $dr = Transaction::groupBy('dr')
            ->interval($after, $before)
            ->selectRaw('dr as account_id, SUM(amount) as debit')
        ;

        $cr = Transaction::groupBy('cr')
            ->interval($after, $before)
            ->selectRaw('cr as account_id, SUM(amount) as credit')
        ;

        return $query
            ->leftJoinSub($dr, 'debit', function ($join) {
                $join->on('debit.account_id', 'accounts.id');
            })
            ->leftJoinSub($cr, 'credit', function ($join) {
                $join->on('credit.account_id', 'accounts.id');
            })
        ;
    }

    /**
     * Scopes a query to attach a balance to each account, based on the
     * transaction calculation of the given month and year number. If 
     * parameters are omitted, current month and year will be used.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $month
     * @param int|null $year
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDuring(
        Builder $query,
        int $month = null,
        int $year = null
    ): Builder {
        $dr = Transaction::groupBy('dr')
            ->during($month, $year)
            ->selectRaw('dr as id, SUM(amount) as debit')
        ;

        $cr = Transaction::groupBy('cr')
            ->during($month, $year)
            ->selectRaw('cr as id, SUM(amount) as credit')
        ;

        return $query
            ->leftJoinSub($dr, 'debit', function ($join) {
                $join->on('debit.id', 'accounts.id');
            })
            ->leftJoinSub($cr, 'credit', function ($join) {
                $join->on('credit.id', 'accounts.id');
            })
        ;
    }
}
