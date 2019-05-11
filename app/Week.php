<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'week', 'shipping_cost', 'plan_id',
    ];

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
}
