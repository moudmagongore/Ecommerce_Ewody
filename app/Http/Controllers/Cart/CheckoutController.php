<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Commande;
use App\models\Produit;
use App\models\Taille;

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

   

    public function indexAchat()
    {
         return view('templateclient.pages.checkoutAchat');
    }


     public function  indexAchatInvite()
    {
         return view('templateclient.pages.checkoutAchatInvite');
    }


    public function getCheckoutInvite()
    {
        return view('templateclient.pages.checkoutInvite');
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

    		'name' => 'required|min:2',    
            'telephone' => 'required|min:2',
           /* 'email' => 'email',*/
            'ville' => 'required|min:2',
            'quartier' => 'required|min:2',
            'lieuProche' => 'required|min:2',
           /* 'date' => 'required'*/

        
    	]);


        /*Pour ajouter le montant total des produits dans le panier soit avec remise ou pas ou avec achat directe*/

        if (request()->session()->has('coupon')) {
          $total = Cart::subtotal() - request()->session()->get('coupon')['remise_en_pourcentage'];
        }
        elseif(Cart::content()->count() > 0)
        {  
           $total = Cart::total();
        }
        elseif(request()->session()->has('cart'))
        {
           foreach (session('cart') as $id => $details) {
               $total= $details['prix_unitaire'] * $details['quantite'];
           }
        }
        

        //Pour ajouter une commade_id unique dans commande 
        $code    = 'ewody#'.rand(1, 1000);

       
    	$commande = new Commande();

        //On insere le montant en bd
        $commande->montant = $total;

        //On insere  la commande en bd
        $commande->commande_id = $code;




        $commande->statut = "En cours";

         $commande->name = $request->name;
         $commande->telephone = $request->telephone;
         $commande->email = $request->email;
         $commande->ville = $request->ville;
         $commande->quartier = $request->quartier;
         $commande->lieuProche = $request->lieuProche;
         $commande->date_livraison = $request->date;

    	//On vas serializer notre panier
         //Pour le panier
        if (Cart::content()->count() > 0) {
           $produits = [];

           $i = 0;

           foreach (Cart::content() as $produit) {
                $produits['produit_' . $i][] = $produit->model->nom;
                $produits['produit_' . $i][] = $produit->model->prix_unitaire;
                $produits['produit_' . $i][] = $produit->qty;
                if ($produit->options->couleur) {

                    $produits['produit_' . $i][] = $produit->options->couleur;
                }
                else
                {
                     $produits['produit_' . $i][] = 'http://nowody.com/uploads/'.$produit->model->photo;
                }

                $produits['produit_' . $i][] = $produit->options->taille;

                /*$produits['produit_' . $i][] = $montantTotalProduit;*/

                $i++;
           }
            $commande->produits = serialize($produits);
             //Pour commander sans avoir a se connecter 
          /* $commande->user_id = Auth()->user()->id ?? '';*/

          //Pour mettre une clé etrangere en null il faut 0
          $commande->user_id = Auth()->user()->id ?? '0';

           //Se connecter avant de commander
           /*$commande->user_id = Auth()->user()->id;*/
           $commande->save();

          /*On fait appel a une function pour decrementer le stock*/
                $this->updateStock();

         /* Pour vider le panier aprés achat*/
           Cart::destroy();
          /* Pour vider le coupon aprés achat*/
          request()->session()->forget('coupon');
        

           Session::flash('success', 'Votre commande à été traitée avec succès.');

           return view('templateclient.pages.merci');
            //End Pour le panier
        }
        elseif(request()->session()->has('cart'))
        {
            //On vas serialiser notre achat direct
             //Pour l'achat directe
            $produit = [];

            $i = 0;

            foreach(session('cart') as $id => $details)
            {
                $produit['produit_' . $i][] = $details['nom'];
                $produit['produit_' . $i][] = $details['prix_unitaire'];
                $produit['produit_' . $i][] = $details['quantite'];
                if ($details['couleurs']) {
                  $produit['produit_' . $i][] = $details['couleurs'];
                }
                else
                {
                  $produit['produit_' . $i][] = 'http://nowody.com/uploads/'.$details['photo'];
                }
                
                
                $produit['produit_' . $i][] = $details['tailles'];

                $i++;
            }

            $commande->produitsAchat = serialize($produit);

           //Pour commander sans avoir a se connecter 
          /* $commande->user_id = Auth()->user()->id ?? '';*/

          //Pour mettre une clé etrangere en null il faut 0
          $commande->user_id = Auth()->user()->id ?? '0';

           //Se connecter avant de commander
           /*$commande->user_id = Auth()->user()->id;*/
           $commande->save();

          /*On fait appel a une function pour decrementer le stock*/
                $this->updateStock();

          /* Pour vider le panier aprés achat*/
           Cart::destroy();
          /* Pour vider le coupon aprés achat*/
          request()->session()->forget('coupon');

          
           Session::flash('success', 'Votre commande à été traitée avec succès.');

           return view('templateclient.pages.merci');
           //End Pour l'achat directe
        }

       
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
