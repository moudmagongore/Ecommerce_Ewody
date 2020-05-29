<?php

namespace App\Http\Controllers\Tailles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Taille;

class TaillesController extends Controller
{
    public function store(Request $request)
    {
    	request()->validate([

    		'designation' => ['required'],
             'quantites' => ['required']
    	]);

    	/*$data = $request->all();

        $tailles = Taille::create($data);*/

    	$tailles = Taille::create([
            'designation' => $request->designation,
            
        ]);

    	$tailles->produits()->attach(request('produit'), ['quantite' => $request->quantites, 'designation' => $request->designation]);

    	flashy('La taille a bien été ajouté.');
        return back();
    }



    public function postTailles(Request $request, $id)
    {
        request()->validate([

            'designation' => ['required'],

        ]);


        $tailles = Taille::whereId($id)->first();

        $data = $request->all();

        $tailles->update($data);

        $tailles->produits()->sync(request('produit'));

        flashy('La taille à bien été modifié.');
         return back();
    }



    public function destroyTailles($id)
    {
        //On recupere l'id
        $tailles = Taille::find($id);

        //enlever les relations avant de supprimer
        $tailles->produits()->detach();

         //On supprime
        $tailles->delete();

         flashy()->error('La taille à bien été supprimé.');
         return back();
    }
}
