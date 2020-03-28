<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;
use App\models\Categorie;

class SousCategorie extends Model
{
    protected $fillable = [
    
        'designation_s_categorie',
        'categorie_id'];

    public function produits(){
        return $this->belongsToMany(Produit::class);
    }

    public function categories(){
        return $this->belongsTo(Categorie::class);
    }
}
