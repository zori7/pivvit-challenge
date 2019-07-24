<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public static $snakeAttributes = false;

    protected $fillable = [
        'customer_name',
        'offering_id',
        'quantity'
    ];

    protected $appends = [
        'unitPrice',
        'total'
    ];

    public function offering () {
        return $this->belongsTo('App\Offering');
    }

    public function getUnitPriceAttribute () {
        return $this->offering->price;
    }

    public function getTotalAttribute () {
        return $this->unitPrice * $this->quantity;
    }
}
