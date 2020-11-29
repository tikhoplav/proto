<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'dr',
    	'cr',
    	'amount',
    	'description',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'description' => '',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:h:i d-m-Y',
        'updated_at' => 'datetime:h:i d-m-Y',
    ];

    /**
     * Get account that the transaction debits to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function debit()
    {
    	return $this->belongsTo(Account::class, 'dr');
    }

    /**
     * Get account that the transaction credit to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit()
    {
    	return $this->belongsTo(Account::class, 'cr');
    }

    /**
     * Scope a query to include transactions which have the specified
     * account in debit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDebit(Builder $query, string $value): Builder
    {
        return $query->where('dr', $value);
    }

    /**
     * Scope a query to include transactions which have the specified
     * account in debit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCredit(Builder $query, string $value): Builder
    {
        return $query->where('cr', $value);
    }

    /**
     * Scope a query to include transactions registered
     * during the specified date time interval.
     * Omitted limit will be ignored from scoping.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $after
     * @param string|null $before
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInterval(
        Builder $query,
        string $after = null,
        string $before = null
    ): Builder {
        if ($after) {
            $after = Carbon::parse($before)->hour(0)->minute(0)->second(0);
            $query = $query->where('created_at', '>=', $after);
        }

        if ($before) {
            $before = Carbon::parse($before)->hour(0)->minute(0)->second(0);
            $query = $query->where('created_at', '<', $before);
        }

        return $query;
    }

    /**
     * Scope a query to include ttransactions registered during the
     * specified month of the specified year. If parameters omitted,
     * current month and year will be used.
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
        $month = $month ?? date('m');
        $year  = $year ?? date('y');

        return $query
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
        ;
    }

    /**
     * Returns result of suming amounts of selected transactions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return float
     */
    public function scopeTotal(Builder $query): float
    {
        return (float) $query->sum('amount');
    }
}
