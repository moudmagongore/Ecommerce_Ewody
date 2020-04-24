<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\Categorie;

class Industrie extends Model
{
    protected $fillable = ['designation_industrie', 'categorie_id'];


    public function categories()
	{
		return $this->hasMany(Categorie::class);
	}
}


