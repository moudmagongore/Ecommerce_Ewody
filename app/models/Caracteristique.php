<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;

class Caracteristique extends Model
{
    protected $fillable = ['designation', 'valeur'];

    public function produits(){
        return $this->belongsToMany(Produit::class);
     }
}
