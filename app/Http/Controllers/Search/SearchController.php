<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Produit;
use App\models\Categorie;
class SearchController extends Controller
{
    public function search(Request $request)
    {
    	

    	$searchs = $request->search;
    	$categories = $request->categorie;

    	if ($searchs) {
    		$produits = Produit::where('nom', 'like', "%$searchs%")
    				->orWhere('marque', 'like', "%$searchs%")
    				->paginate(10);
    	}
    	else
    	{
    		$categorie = Categorie::where('designation_categorie', $categories)->firstOrFail();

    		$produits = $categorie->produits;
    	}
    	
    				

    	return view('templateclient.pages.produitsrechercher', compact('produits'));

    }
}
