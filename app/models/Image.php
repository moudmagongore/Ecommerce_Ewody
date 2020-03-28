<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;

class Image extends Model
{
  protected  $fillable = ['nom', 'produit_id'];

  protected $table='images';

  public function produits(){

    return $this->belongsTo(Produit::class);
  }
}
