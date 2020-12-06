<?php

namespace App\Models;

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
     * Get all nested subaccounts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subaccounts()
    {
    	return $this->hasMany(Subaccount::class);
    }

    /**
     * Scope a query to include all nested subaccounts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpanded($query)
    {
    	return $query->with('subaccounts');
    }
}
