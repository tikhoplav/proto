<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
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
    protected $fillable = ['name'];

    /**
     * Get account that belongs to the ledge.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Scopes a query to attach a balance for each ledger,
     * as the result of grouping balances for all accounts.
     * Omitted limit will be ignored from scoping.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $after
     * @param string|null $before
     * @param bool $detailed
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBalance(
        Builder $query,
        string $after = null,
        string $before = null,
        bool $detailed = false
    ): Builder {
        if ($detailed) {
            $query = $query
                ->with('accounts', function ($q) use ($after, $before) {
                    $q->balance($after, $before)
                        ->where('debit', '<>', null)
                        ->orWhere('credit', '<>', null)
                    ;
                })
            ;
        }

        $balance = Account::groupBy('ledger_id')
            ->balance($after, $before)
            ->selectRaw("
                ledger_id as id,
                SUM(debit) as debit,
                SUM(credit) as credit
            ")
        ;

        return $query->leftJoinSub($balance, 'balance', function ($join) {
            $join->on('balance.id', 'ledgers.id');
        });
    }

    /**
     * Scopes a query to attach a balance for each ledger,
     * as the result of grouping balances for all accounts. If 
     * parameters are omitted, current month and year will be used.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $month
     * @param int|null $year
     * @param bool $detailed
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDuring(
        Builder $query,
        int $month = null,
        int $year = null,
        bool $detailed = false
    ): Builder {
        if ($detailed) {
            $query = $query
                ->with('accounts', function ($q) use ($month, $year) {
                    $q->during($month, $year)
                        ->where('debit', '<>', null)
                        ->orWhere('credit', '<>', null)
                    ;
                })
            ;
        }
        
        $balance = Account::groupBy('ledger_id')
            ->during($month, $year)
            ->selectRaw("
                ledger_id as id,
                SUM(debit) as debit,
                SUM(credit) as credit
            ")
        ;

        return $query->leftJoinSub($balance, 'balance', function ($join) {
            $join->on('balance.id', 'ledgers.id');
        });
    }
}
