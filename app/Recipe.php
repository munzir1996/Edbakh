<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ar', 'subtitle_ar', 'title_en', 'subtitle_en', 'description_ar', 'description_en', 'calories',
        'time', 'level', 'component_id', 'dish_id', 'season_id', 'plan_id', 'date_id',
    ];

    public function component() {
        return $this->belongsTo(Component::class);
    }
    
    public function dish() {
        return $this->belongsTo(Dish::class);
    }

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
    
    public function date() {
        return $this->belongsTo(Date::class);
    }

    public function nutritions() {
        return $this->hasMany(Nutrition::class);
    }

    public function instructions() {
        return $this->hasMany(Instruction::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function puts() {
        return $this->belongsToMany(Put::class);
    }

    public function contains() {
        return $this->belongsToMany(Contain::class)->withPivot('amount');
    }

    public function stars(){
        return $this->hasMany(Star::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
    
}



