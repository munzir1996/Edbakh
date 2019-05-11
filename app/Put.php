<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Put extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar', 'name_en',
    ];

    public function recipes() {
        return $this->belongsToMany(Recipe::class);
    }
}
