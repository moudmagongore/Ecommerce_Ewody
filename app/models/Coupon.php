<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function discount($subtotal)
    {
    	return ($subtotal * ($this->remise_en_pourcentage / 100 ));
    }
}
