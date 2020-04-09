<?php

namespace App\Http\Controllers\Avis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Produit;
use App\models\Avis;
use Illuminate\support\Facades\Auth;


class AvisController extends Controller
{
    public function storeAvis(Request $request, $id)
    {

    	$this->validate($request, [
    		'message' => 'required|min:3'
    	]);


    	/*On recupere l'user connecté avec l'id*/
    	$user = Auth::user()->id;

    	/*On recupere le produit qu'il veut commenter*/
    	$produit = Produit::find($id);


    	$avis = Avis::create([

    		'user_id' => $user,
    		'produit_id' => $produit->id,
    		'commentaire' => $request->message

    	]);

    	flashy('Votre avis à bien été ajouté.');
    	return back();

    	
    }
}
