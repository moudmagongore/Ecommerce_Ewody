<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Livraison;
use App\User;


class Commande extends Model
{

	protected $fillable = ['nom', 'prenom', 'telephone', 'adresse'];


     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function livraisons()
    {
    	return $this->hasMany(Livraison::class);
    }
}
