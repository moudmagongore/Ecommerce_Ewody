<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\models\Fournisseur;
use App\models\Categorie;
use App\models\SousCategorie;
use App\models\Caracteristique;
use App\models\Imagemodel;

use App\models\Couleur;
use App\models\Taille;

class Produit extends Model
{
    protected $fillable = [
        'nom', 
        'description' ,
        'marque' ,
        'quantite' ,
        'fournisseur_id' ,
        'prix_unitaire' ,
        'prix_maximum' ,
        'titre_video' ,
        'photo',
        'quantite'
    ];


    //Cette function n'est disponible en tant que methode de notre model
    public function getprixminimum()
    {
        $prix_unitaire = $this->prix_unitaire / 1000;

        return number_format($prix_unitaire, 3, ' ', ' '). ' GNF';
    }


     //Cette function n'est disponible en tant que methode de notre model
    public function getprixmaximum()
    {
        $prix_maximum = $this->prix_maximum / 1000;

        return number_format($prix_maximum, 3, '.', ' '). ' GNF';
    }




    public function fournisseurs(){

        return $this->belongsTo(Fournisseur::class);

    }
    
    public function categories(){

        return $this->belongsToMany(Categorie::class);

    }

    public function sous_categories(){

        return $this->belongsToMany(SousCategorie::class);

    }

     public function caracteristiques(){
        return $this->belongsToMany(Caracteristique::class);
    }



    public function images(){
        return $this->hasMany(Imagemodel::class);
    }


    public function couleurs()
    {
        return $this->belongsToMany(Couleur::class)->withPivot('images');
    }

     public function tailles()
    {
        return $this->belongsToMany(Taille::class)/*->withPivot('quantite')*/;
    }



    public function favori()
    {
        return $this->belongsToMany(Favori::class);
    }
    
}
