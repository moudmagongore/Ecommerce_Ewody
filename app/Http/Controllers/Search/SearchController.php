<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Produit;
use App\models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SearchController extends Controller
{
    public function search(Request $request)
    {
    	

    	$searchs = $request->search;
    	$categories = $request->categorie;

        $users  = Auth::user();

    	if ($searchs) {
    		$produits = Produit::where('nom', 'like', "%$searchs%")
    				->orWhere('marque', 'like', "%$searchs%")
    				->paginate(10);


            /*On crée une session pour recuperer la recherche de l'utilisateur en meme temps on inserer des données rechercher par le user dans la session*/
            Session::put('rechercheInput', $produits);



            /*comment stocker les données dans la session et les supprimer aprés une prochaine requete HTTP.
            Si vous souhaitez enregistrer des variables de session uniquement pour les transmettre à la prochaine requête, utilisez la méthode Session::flash*/
           /* Session()->flash('rechercheInput', $produits);*/
                

            /*Comment recuperer une session ya 2 methodes*/
           /* dd( $request->session()->get('rechercheInput'));*/
           /* dd( Session::get('rechercheInput'));*/

            /* Comment supprimer une session*/
             /*session()->forget('rechercheInput');*/
                   
    	}
    	else
    	{
    		$categorie = Categorie::where('designation_categorie', $categories)->firstOrFail();


    		$produits = $categorie->produits;

            /*On crée une session pour recuperer la recherche de l'utilisateur en meme temps on inserer des données rechercher par le user dans la session*/
             Session::put('rechercheCategorie', $produits);
               
    	}
    	
    				

    	return view('templateclient.pages.produitsrechercher', compact('produits'));

    }
}
