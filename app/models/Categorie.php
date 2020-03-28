<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;
use App\models\SousCategorie;

class Categorie extends Model
{
   protected $fillable = ['designation_categorie'];

   public function produits(){
      return $this->belongsToMany(Produit::class);
   }

   public function sous_categories(){
      return $this->hasMany(SousCategorie::class);
   }
}
