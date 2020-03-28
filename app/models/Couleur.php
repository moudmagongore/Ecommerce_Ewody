<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;

class Couleur extends Model
{
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
}
