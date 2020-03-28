<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Commande;


class Livraison extends Model
{
     protected $fillable = ['date_livraison_reelle' ,
     'montant',
     'quantite',
     'commande_id',
     'produit_id'];

     public function commande()
     {
     	return $this->belongsTo(Commande::class);
     }
}
