<?php

namespace App\Models;

use App\HasUid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Subconto
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'first_name',
    	'middle_name',
    	'last_name',
    	'title',
    	'gender',
    	'birthday',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'datetime:d-m-Y',
        'created_at' => 'datetime:h:i d-m-Y',
        'updated_at' => 'datetime:h:i d-m-Y',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'name',
        'full_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'first_name',
        'middle_name',
        'last_name',
        'title',
        'updated_at',
    ];

    /**
     * Get person's shorten name
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->last_name} {$this->first_name[0]}";
    }

    /**
     * Get person's full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
    	return collect([
    		$this->title,
    		$this->first_name,
    		$this->middle_name,
    		$this->last_name,
    	])->filter()->join(' ');
    }
}
