<?php

namespace App;

use App\models\Fournisseur;
use App\models\Privillege;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\models\Commande;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nom', 'prenom', 'telephone', 'adresse', 'provider_name', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class)->orderBy('created_at', 'DESC');
    }


    public function fournisseurs(){
        return $this->hasMany(Fournisseur::class);
    }

    public function privilleges(){
        return $this->belongsToMany(Privillege::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }



    public function isAdmin()
    {
        //si la ligne renvoie true on return vrai si non faux
        //$this->privilleges() pour acceder au privillege
        //where parcq on cherche une seule valeurs a la clé name
        return $this->privilleges()->where('designation_privillege', 'Administrateur')->first();
    }


     public function hasAnyRole(array $privilleges)
    {
        //whereIn parcq on cherche plusieurs valeurs a la clé name
        return $this->privilleges()->whereIn('designation_privillege', $privilleges)->first();
    }

}
