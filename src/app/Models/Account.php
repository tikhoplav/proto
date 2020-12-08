<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Closure;

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
    protected $fillable = [
    	'id',
    	'name',
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
     * Get children accounts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
    	return $this->hasMany(Account::class, 'parent_id');
    }

    /**
     * Scope a query to include only root accounts.
     * Root accounts doesn't have any ancestors.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRoot($query)
    {
        return $query->where('parent_id', null);
    }

    /**
     * Scope a query to include all descendent accounts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBranch($query)
    {
        $query = $query->union(Account::select('accounts.*')
            ->join('tree', 'tree.id', 'accounts.parent_id')
        );

        $query = DB::table('tree')->withRecursiveExpression('tree', $query);

        return Account::rightJoinSub($query, 'sub', function ($join) {
            $join->on('accounts.id', 'sub.id');
        });
    }

    /**
     * Get all related transaction by account's debit registry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function debits()
    {
        return $this->hasMany(Transaction::class, 'debit_id');
    }

    /**
     * Get all related transaction by account's credit registry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function credits()
    {
        return $this->hasMany(Transaction::class, 'credit_id');
    }
}
