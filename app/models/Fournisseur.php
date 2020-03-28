<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;
use App\User;

class Fournisseur extends Model
{
   protected $fillable = ['nom', 
   'prenom' ,
   'telephone' ,
   'email' ,
   'adresse' ,
   'motdepass' ];


   public function produits(){
      return $this->hasMany(Produit::class);
   }


   public function users(){
      return $this->belongsTo(User::class);
   }
}
