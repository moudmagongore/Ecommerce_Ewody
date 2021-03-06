<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Produit;

class Image extends Model
{
  protected  $fillable = ['images', 'produit_id'];

  protected $table='images';

  public function produit(){

    return $this->belongsTo(Produit::class);
  }
}
