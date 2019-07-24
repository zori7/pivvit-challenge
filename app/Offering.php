<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    public static $snakeAttributes = false;

    protected $fillable = [
        'title',
        'price'
    ];

    public function purchases () {
        return $this->hasMany('App\Purchases');
    }
}
