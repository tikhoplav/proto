<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

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
     * Scope a query to include only root accounts.
     * Root accounts doesn't have any ancestors.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRoot($query)
    {
        return $query->where('parent_id', null);
    }

    /**
     * Get account's is_root attribute.
     * Root accounts doesn't have any ancestors.
     *
     * @return bool
     */
    public function getIsRootAttribute()
    {
        return !$this->parent_id;
    }

    /**
     * Get children accounts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
    	return $this->hasMany(self::class, 'parent_id');
    }    

    /**
     * Scope a query to include only childless accounts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChildless($query)
    {
        return $query->whereDoesntHave('children');
    }

    /**
     * Get account's is_childless attribute.
     *
     * @return bool
     */
    public function getIsChildlessAttribute()
    {
        return !$this->children()->exists();
    }

    /**
     * Get all children recursive.
     * Returns a tree like structure.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branch()
    {
        return $this->children()->with('branch');
    }

    /**
     * Scope a query to include all descendent accounts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDescendant($query)
    {
        $table = self::getTable();
        $union = self::selectRaw("{$table}.*, (tree.depth + 1) as depth")
            ->join('tree', 'tree.id', "{$table}.parent_id");
        $query = $query->selectRaw("{$table}.*, 0 as depth")->union($union);
        $query = DB::table('tree')->withRecursiveExpression('tree', $query);

        return self::fromSub($query, $table);
    }

    /**
     * Get descendant accounts query
     * Returns flat structure.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function descendants()
    {
        return self::where('parent_id', $this->id)->descendant();
    }

    /**
     * Get all descendant accounts.
     * Returns flat structure.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDescendantsAttribute()
    {
        return $this->descendants()->get();
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

    /**
     * Scopes a query to include only accounts, 
     * that have at least one related transaction
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasTransactions($query)
    {
        return $query->whereExists(function ($query) {
            $query
                ->from('transactions')
                ->whereColumn('transactions.debit_id', 'accounts.id')
                ->orWhereColumn('transactions.credit_id', 'accounts.id');
        });
    }

    /**
     * Get related transactions query
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function transactions()
    {
        return Transaction::where(function ($query) {
            $query
                ->where('debit_id', $this->id)
                ->orWhere('credit_id', $this->id);
        });
    }

    /**
     * Get all related transactions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTransactionsAttribute()
    {
        return $this->transactions()->get();
    }

    /**
     * Get account's has_transactions attribute
     *
     * @return bool
     */
    public function getHasTransactionsAttribute()
    {
        return $this->transactions()->exists();
    }

    public static function balance($query)
    {
        $query = self::childless()
        ->selectRaw("id, parent_id, debit, credit")
        ->joinSub($query->balance(), 'balance', function ($join) {
            $join->on('balance.account_id', 'accounts.id');
        })
        ->unionAll(DB::table('accounts')
            ->selectRaw("accounts.id, accounts.parent_id")
            ->selectRaw("tree.debit, tree.credit")
            ->join('tree', 'tree.parent_id', 'accounts.id')
        );

        $query = DB::table('tree')
            ->withRecursiveExpression('tree', $query)
            ->groupBy('id')
            ->selectRaw("id, sum(debit) as debit, sum(credit) as credit");

        return self::root()
            ->descendant()
            ->leftJoinSub($query, 'balance', function ($join) {
                $join->on('balance.id', 'accounts.id');
            })
            ->selectRaw("accounts.id")
            ->selectRaw("accounts.name")
            ->selectRaw("accounts.parent_id")
            ->selectRaw("accounts.depth")
            ->selectRaw("balance.debit")
            ->selectRaw("balance.credit")
            ->orderBy('id', 'asc');
    }

    public static function trialBalance($from, $to)
    {
        $before = self::balance(Transaction::before($from));
        $during = self::balance(Transaction::after($from)->before($to));
        $result = self::balance(Transaction::before($to));

        return self::fromSub($result, 'result')
            ->leftJoinSub($during, 'during', function ($join) {
                $join->on('during.id', 'result.id');
            })
            ->leftJoinSub($before, 'before', function ($join) {
                $join->on('result.id', 'before.id');
            })
            ->selectRaw("result.id")
            ->selectRaw("result.name")
            ->selectRaw("result.parent_id")
            ->selectRaw("result.depth")
            ->selectRaw("before.debit as before_debit")
            ->selectRaw("before.credit as before_credit")
            ->selectRaw("during.debit as during_debit")
            ->selectRaw("during.credit as during_credit")
            ->selectRaw("result.debit as result_debit")
            ->selectRaw("result.credit as result_credit");
    }

    public static function toTree(Collection $flat)
    {
        $nest = function (Collection $items, int $depth) {
            $toNest = $items
            ->filter(function ($item) use ($depth) {
                return $item->depth === $depth;
            })
            ->groupBy('parent_id');

            return $items
            ->filter(function ($item) use ($depth) {
                return $item->depth < $depth;
            })
            ->map(function ($item) use ($toNest) {
                $item->subs = $toNest->get($item->id);
                return $item;
            });
        };

        for ($i = $flat->max('depth'); $i > 0; $i--) {
            $flat = $nest($flat, $i);
        }

        return $flat;
    }
}
