<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User

class Avis extends Model
{
    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
