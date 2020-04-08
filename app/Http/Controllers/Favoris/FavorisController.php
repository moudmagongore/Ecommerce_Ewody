<?php

namespace App\Http\Controllers\Favoris;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\Favori;
use App\models\Produit;


class FavorisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favoris = Favori::OrderBy('created_at', 'DESC')->where('user_id', $user->id)->get();

        return view('templateclient.pages.favori', compact('user', 'favoris'));
    }

    public function store(Request $request, $id)
    {
        $produits = Produit::find($id);

       /* pour eviter d'ajouter 2 favoris sur un produit*/
        $status=Favori::where('user_id', Auth::user()->id)
                ->where('produit_id', $produits->id)
                ->first();



       if(isset($status->user_id) and isset($produits->id))
       {
           flashy()->error('Cet produit est déjà dans votre liste de souhaits !');

           return back();
       }
       else
       {
            $favoris = new Favori();
            $favoris->user_id = Auth()->user()->id;
            $favoris->produit_id = $produits->id;

            $favoris->save();

            flashy('Le produit est bien ajouté dans votre liste de souhaits');
            return back();
       }
    
    }


    public function destroyFavoris($id)
    {
        Favori::destroy($id);

        flashy()->error('Le favoris est bien retiré');
        return back();
    }
}
