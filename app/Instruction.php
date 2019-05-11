<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'step', 'title_ar', 'description_ar', 'title_en', 'description_en', 'recipe_id',
    ];

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
