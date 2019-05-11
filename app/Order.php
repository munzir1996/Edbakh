<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const DELIVERED = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'recipe_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
