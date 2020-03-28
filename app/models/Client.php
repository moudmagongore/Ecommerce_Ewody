<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom' ,
        'prenom' ,
        'telephone' ,
        'email' ,
        'mot_de_pass' ,
        'adresse' ,
        'login' ,
        'mot_de_pass_confirm' 
    ];
}
