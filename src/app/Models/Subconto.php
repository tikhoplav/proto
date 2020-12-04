<?php

namespace App\Models;

use App\HasUid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

abstract class Subconto extends Model
{
    use HasUid;

    /**
     * Get all transaction related to the subconto
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function transactions(): MorphToMany
    {
    	return $this->morphToMany(
    		Transaction::class,
    		'subconto',
    		'subconto'
    	);
    }
}
