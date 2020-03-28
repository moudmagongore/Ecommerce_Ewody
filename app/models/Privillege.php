<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Privillege extends Model
{
    protected $fillable = ['designation_privillege'];

    
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
