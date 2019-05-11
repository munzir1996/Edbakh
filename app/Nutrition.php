<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fats', 'saturated_fats', 'carbohydrate', 'sugar', 'dietary_fiber', 'protein', 'cholestrol', 'sodium',
        'recipe_id',
    ];

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
