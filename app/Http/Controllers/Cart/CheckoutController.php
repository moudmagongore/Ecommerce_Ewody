<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Commande;
use App\models\Produit;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function merci()
    {
    	return Session::has('success') ? view('templateclient.pages.merci') : redirect()->route('acceuil');

    	/*return view('templateclient.pages.merci');*/
    }

     public function index()
    {
        
        return view('templateclient.pages.checkout');
    }



    public function store(Request $request)
    {
    	//Eviter d'acheter un produit qui n'existe plus
        //si le produit n'est plus disponible est qu'il est déjà ajouté au panier 
          if ($this->checkIfNotAvailable()) {
              //On renvoie une erreur on return true
            Session::flash('danger', 'Un produit dans votre panier n\'est plus disponible.');
            return redirect()->route('acceuil');
          }



    	$this->validate($request, [

    		'nom' => 'required|min:2',
    		'prenom' => 'required|min:2',    
            'telephone' => 'required|min:2',
            'adresse' => 'required|min:2',
            /*'date' => 'required|'*/

        
    	]);

    	/*$commandes = Commande::create([

    		'nom' => $request->nom,
    		'prenom' => $request->prenom,
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,

    	]);*/


    	$commande = new Commande();

         $commande->nom = $request->nom;
         $commande->prenom = $request->prenom;
         $commande->telephone = $request->telephone;
         $commande->adresse = $request->adresse;
         $commande->date_livraison = $request->date;

    	//On vas serializer notre panier
       $produits = [];

       $i = 0;

       foreach (Cart::content() as $produit) {
            $produits['produit_' . $i][] = $produit->model->nom;
            $produits['produit_' . $i][] = $produit->model->prix_unitaire;
            $produits['produit_' . $i][] = $produit->qty;
            $produits['produit_' . $i][] = $produit->photo;

            $i++;
       }

       $commande->produits = serialize($produits);
       //Pour commander sans avoir a se connecter
       /*$commande->user_id = Auth()->user()->id ?? '';*/
       $commande->user_id = Auth()->user()->id;
       $commande->save();

      /*On fait appel a une function pour decrementer le stock*/
            $this->updateStock();

       Cart::destroy();

       Session::flash('success', 'Votre commande à été traitée avec succès.');

       return view('templateclient.pages.merci');

       
    }




     //Eviter d'acheter un produit qui n'existe plus
    private function checkIfNotAvailable()
    {
        foreach (Cart::content() as $item) {
            
            //On recupere l'id du produit dans le panier
            $produit = Produit::find($item->model->id);

            //si ce qui es en bd est inferieur ace que l'user a selectioner
            if ($produit->quantite < $item->qty) {
                return true;
            }
        }

        return false;

    }








     //Une function pour decrementer le stock
    private function updateStock()
    {
        //On boucle dans le panier pour recuperer le produit qui est dans le panier
        foreach (Cart::content() as  $item) {

            //On recupere l'id du produit dans le panier
            $produit = Produit::find($item->model->id);

            //On retire le nombre de la quantité qu'on as selectionner
            $produit->update([

                //on prend le stock en BD on le soustrais par la qtité selectionné
                'quantite' => $produit->quantite - $item->qty

            ]);
        }
    }
}
