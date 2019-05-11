<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_ar', 'description_en', 'description_ar', 'serve', 'price_per_serve', 'active',
        'trash', 'image',
    ];

    public function weeks() {
        return $this->hasMany(Week::class);
    }

    public function recipes() {
        return $this->hasMany(Recipe::class);
    }

    public function dates() {
        return $this->hasMany(Date::class);
    }

    public function subscribes() {
        return $this->hasMany(Subscribe::class);
    }
}

