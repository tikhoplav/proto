<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'subconto',
    ];

    /**
     * Get all related subconto to the transaction
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSubcontoAttribute(): Collection
    {
        return collect(DB::table('subconto')
            ->where('transaction_id', $this->id)
            ->selectRaw("CONCAT(subconto_type, '/', subconto_id) as uid")
            ->get()
        );
    }

    /**
     * Set transaction subconto
     *
     * @param \Illuminate\Support\Collection $subconto
     *
     * @return void
     */
    public function setSubcontoAttribute(Collection $subconto): void
    {
        $data = $subconto->map(function ($item) {
            if (is_array($item)) {
                $item = (object) $item;
            }

            $uid = Str::of($item->uid)->explode('/');

            return [
                'transaction_id' => $this->id,
                'subconto_id' => $uid->pop(),
                'subconto_type' => $uid->join('/'),
            ];
        });

        DB::table('subconto')->where('transaction_id', $this->id)->delete();
        DB::table('subconto')->insert($data->all());
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
            $after = Carbon::parse($after)->hour(0)->minute(0)->second(0);
            $query = $query->where('created_at', '>=', $after);
        }

        if ($before) {
            $before = Carbon::parse($before)->hour(0)->minute(0)->second(0);
            $query = $query->where('created_at', '<', $before);
        }

        return $query;
    }
}
