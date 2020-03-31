<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $fillable = ['code', 'remise_en_pourcentage'];


    public function discount($subtotal)
    {
    	return ($subtotal * ($this->remise_en_pourcentage / 100 ));
    }
}
