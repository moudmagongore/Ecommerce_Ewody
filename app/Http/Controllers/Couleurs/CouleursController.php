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



    	$couleurs = Couleur::create([
            'designation' => $request->designation,
            /*'photo' => $path*/
        ]);

        /*$path = request('image')->store('avatars_couleur', 'public');*/

         //
            $image = request('image');

            $ext = $image->getclientOriginalExtension();
            $filename = uniqid().'.'.$ext;

            $path = $image->storeAs('avatars_couleur', $filename, 'public_uploads');
         //
        

        $couleurs->produits()->attach(request('produit'), ['images' => $path]);

        flashy('La couleur a bien été ajouté.');
        return back();

    }


    public function postCouleur(Request $request, $id)
    {
         request()->validate([

            'designation' => ['required'],
            'image' => ['nullable', 'image'],
            
        ]);



         $couleurs = Couleur::whereId($id)->first();

        /* $data = $request->all();*/

         $couleurs->update([

            'designation' => $request->designation,
         ]);

         /*$path = request('image')->store('avatars_couleur', 'public');*/

          //
            $image = request('image');

            $ext = $image->getclientOriginalExtension();
            $filename = uniqid().'.'.$ext;

            $path = $image->storeAs('avatars_couleur', $filename, 'public_uploads');
         //

         $couleurs->produits()->sync(request('produit'), ['photo' => $path]);

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
