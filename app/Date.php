<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_ar', 'date_en', 'plan_id',
    ];

    public function plan() {
        return $this->belongsTo(plan::class);
    }

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }
}
