<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;
use App\models\SousCategorie;
use App\models\Industrie;

class Categorie extends Model
{
   protected $fillable = ['designation_categorie', 'industrie_id', 'image'];

   public function produits(){
      return $this->belongsToMany(Produit::class);
   }

   public function sous_categories(){
      return $this->hasMany(SousCategorie::class);
   }

   public function industrie()
   {
   		return $this->belongsTo(Industrie::class);
   }
}
