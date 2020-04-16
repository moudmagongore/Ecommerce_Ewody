<?php

namespace App\Http\Controllers\Couleurs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Couleur;

class CouleursController extends Controller
{
    public function store(Request $request)
    {
    	 request()->validate([

            'designation' => ['required'],
            
        ]);

    	$data = $request->all();

    	$couleurs = Couleur::create($data);

        $couleurs->produits()->attach(request('produit'));

        flashy('La couleur a bien été ajouté.');
        return back();

    }


    public function postCouleur(Request $request, $id)
    {
         request()->validate([

            'designation' => ['required'],
            
        ]);

         $couleurs = Couleur::whereId($id)->first();

         $data = $request->all();

         $couleurs->update($data);

         $couleurs->produits()->sync(request('produit'));

         flashy('La couleur à bien été modifié.');
         return back();
    }


    public function destroyCouleur($id)
    {
        //On recupere l'id
        $couleurs = Couleur::find($id);
        

        //enlever les relations avant de supprimer
        $couleurs->produits()->detach();

        //On supprime
        $couleurs->delete();


         flashy()->error('La couleur à bien été supprimé.');
        return back();
    }
}
