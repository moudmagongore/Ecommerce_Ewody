<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;


class Taille extends Model
{
    protected $fillable = ['designation', 'produit_taille'];

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->using(ProduitTaille::class)->withPivot('quantite', 'designation')->withTimestamps();
    }
}
