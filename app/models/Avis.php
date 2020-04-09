<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Avis extends Model
{
	protected $fillable = ['user_id', 'produit_id', 'commentaire'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
