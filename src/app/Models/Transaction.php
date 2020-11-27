<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
