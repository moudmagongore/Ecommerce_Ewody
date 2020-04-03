<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $fillable = ['user_id', 'produit_id'];


    public function produit()
    {
    	return $this->belongsTo(Produit::class);
    }
}
