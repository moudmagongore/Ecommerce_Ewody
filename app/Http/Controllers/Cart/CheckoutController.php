<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Commande;
use App\models\Produit;
use App\models\Taille;
use App\models\Couleur;
use App\models\CouleurProduit;
use App\models\ProduitTaille;
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

          //Eviter d'acheter un produit qui n'existe plus
          //si le produit n'est plus disponible est qu'il est déjà ajouté au panier 
          if ($this->checkIfNotAvailable()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Un produit dans votre panier n\'est plus disponible.');
            return redirect()->route('acceuil');
          }

          //Eviter d'acheter un produit dont la couleur n'existe plus
          //si la couleur n'est plus disponible est qu'il est déjà ajouté au panier 
          elseif ($this->checkIfNotAvailableCouleur()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une couleur pour un produit dans votre panier n\'est plus disponible.');
            return redirect()->route('acceuil');
          }

          //Eviter d'acheter un produit dont la taille n'existe plus
          //si la taille n'est plus disponible est qu'il est déjà ajouté au panier 
          elseif ($this->checkIfNotAvailableTaille()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une taille pour un produit dans votre panier n\'est plus disponible.');
            return redirect()->route('acceuil');
          }
          /*End*/


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
                     $produits['produit_' . $i][] = 'https://www.nowody.com/uploads/'.$produit->model->photo;
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

          /*On fait appel a une function pour decrementer le stock du produit pour le panier*/
                $this->updateStock();

          /*On fait appel a une function pour decrementer la couleur pour le panier*/
                $this->updateStockCouleur();

          /*On fait appel a une function pour decrementer la taille pour le panier*/
                $this->updateStockTaille();

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

          //Eviter d'acheter un produit qui n'existe plus
          //si le produit n'est plus disponible est que nous sommes dejà au checkout c a d un user à dejà achété le produit que nous voulons.
           if ($this->checkIfNotAvailableByNow()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Le produit selectionné n\'est plus disponible en stock.');
            return redirect()->route('acceuil');
          }

          //Eviter d'acheter un produit dont la couleur n'existe plus
          //si la couleur du produit n'est plus disponible est que nous sommes dejà au checkout c a d un user à dejà achété la couleur du produit que nous voulons.
           elseif($this->checkIfNotAvailableCouleurByNow()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une couleur pour un produit selectionné n\'est plus disponible en stock.');
            return redirect()->route('acceuil');
          }

         //Eviter d'acheter un produit dont la taille n'existe plus
          //si la taille du produit n'est plus disponible est que nous sommes dejà au checkout c a d un user à dejà achété la taille du produit que nous voulons.
           elseif($this->checkIfNotAvailableTailleByNow()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une taille pour un produit selectionné n\'est plus disponible en stock.');
            return redirect()->route('acceuil');
          }
          /*End*/
          

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
                  $produit['produit_' . $i][] = 'https://www.nowody.com/uploads/'.$details['photo'];
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

          /*On fait appel a une function pour decrementer le stock du produit pour le button acheter maintenat*/
            $this->updateStockByNow();

          /*On fait appel a une function pour decrementer la couleur pour le button acheter maintenat*/
            $this->updateStockCouleurByNow();


           /*On fait appel a une function pour decrementer la taille pour le button acheter maintenant*/
            $this->updateStockTailleByNow();

          /* Pour vider le panier aprés achat*/
           Cart::destroy();
          /* Pour vider le coupon aprés achat*/
          request()->session()->forget('coupon');

          /* Pour vider la session cart aprés achat*/
          request()->session()->forget('cart');
          /*session()->forget('cart');*/

          
           Session::flash('success', 'Votre commande à été traitée avec succès.');

           return view('templateclient.pages.merci');
           //End Pour l'achat directe
        }

       
    }




    public function produitNonExiste()
    {
          //Eviter d'acheter un produit qui n'existe plus
          //si le produit n'est plus disponible est qu'il est déjà ajouté au panier 
          if ($this->checkIfNotAvailable()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Un produit dans votre panier n\'est plus disponible.');
            return back();
          }

          //Eviter d'acheter un produit dont la couleur n'existe plus
          //si la couleur n'est plus disponible est qu'il est déjà ajouté au panier 
          elseif ($this->checkIfNotAvailableCouleur()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une couleur pour un produit dans votre panier n\'est plus disponible.');
            return back();
          }

          //Eviter d'acheter un produit dont la taille n'existe plus
          //si la taille n'est plus disponible est qu'il est déjà ajouté au panier 
          elseif ($this->checkIfNotAvailableTaille()) {
            //On renvoie une erreur on return true c a d ce qui es en bd est inferieur ace que l'user a selectioner
            flashy()->error('Une taille pour un produit dans votre panier n\'est plus disponible.');
            return back();
          }
          /*End*/    
    }























            /*checkIfNotAvailable Pour button panier*/

     //Eviter d'acheter un produit qui n'existe plus après ajout dans le panier
    private function checkIfNotAvailable()
    {
        foreach (Cart::content() as $item) {
            
            //On recupere l'id du produit dans le panier
            $produit = Produit::find($item->model->id);
           

            //si ce qui es en bd est inferieur ace que l'user a selectioner on return true
            if ($produit->quantite < $item->qty) {
                return true;
            }
        }
        /*si non si cest ok on return false*/
        return false;

    }



     //Eviter d'acheter un produit dont la couleur n'existe plus après ajout dans le panier
    private function checkIfNotAvailableCouleur()
    {
        foreach (Cart::content() as $item) {
            
            /*Pour recuperer la couleur de l'image au niveau panier*/
            $couleurCliquerNotExist = $item->options->couleur;


            /*On appel le model de la relation qui est :  CouleurProduit*/
            /*Dans CouleurProduit on recupere l'image ou l'image est egal à l'image qui se trouve au niveau panier c a d l'image de la couleur selectionner par le user*/
            $coulProdNotExist = CouleurProduit::where('images', $couleurCliquerNotExist)->
              first();


             /*Pourquoi la condition car si le produit dans le panier n'as pas de couleur il renveras null et si $coulProd est null il nous renveras une erreur.*/
              if ($coulProdNotExist)
              {
                 //si ce qui es en bd est inferieur ace que l'user a selectioner on return true
                if ($coulProdNotExist->quantite < $item->qty) {
                      return true;
                }
              }
        }
        /*si non si cest ok on return false*/
        return false;
    }



     //Eviter d'acheter un produit dont la taille n'existe plus après ajout dans le panier
    private function checkIfNotAvailableTaille()
    {
        foreach (Cart::content() as $item)
        {

          //On recupere seulement l'id du produit dans le panier
              $idProduit = $item->id;

            
            /*Pour recuperer la taille du produit au niveau panier*/
            $tailleCliquerNotExist = $item->options->taille;


            
            
           /*On appel le model de la relation qui est :  ProduitTaille*/
          /*Dans ProduitTaille on recupere la designaion ou taille. ou taille est egal a la tailleCliquerNotExist qui se trouve au niveau  panier c a d la taille selectionner par le user. En meme temps on recupere aussi le produit qui est egal au produit se trouvant dans le panier*/
          $tailleProdNotExist = ProduitTaille::where('designation', $tailleCliquerNotExist)->where('produit_id', $idProduit)->
            first();



             /*Pourquoi la condition car si le produit dans le panier n'as pas de taille il renveras null et si $tailleProdNotExist est null il nous renveras une erreur.*/
              if ($tailleProdNotExist)
              {
                 //si ce qui es en bd est inferieur ace que l'user a selectioner on return true
                if ($tailleProdNotExist->quantite < $item->qty) {
                      return true;
                }
              }
        }
        /*si non si cest ok on return false*/
        return false;
    }


                  /*End checkIfNotAvailable Pour button panier*/









            /*checkIfNotAvailable Pour button acheter maintentant*/

     //Eviter d'acheter un produit qui n'existe plus après arriver au nivo checkout par le button acheter maintenant
    private function checkIfNotAvailableByNow()
    {
        foreach(session('cart') as $id => $details)
        {
            
            //On recupere l'id du produit dans la session
            $produit = Produit::find($details['id']);

            //si ce qui es en bd est inferieur ace que l'user a selectioner c a d la quantité dans la session on return true
            if ($produit->quantite < $details['quantite']) {
                return true;
            }
        }

         /*si non si cest ok on return false*/
        return false;

    }




     //Eviter d'acheter un produit dont la couleur n'existe plus après arriver au nivo checkout par le button acheter maintenant
    private function checkIfNotAvailableCouleurByNow()
    {
        foreach(session('cart') as $id => $details)
        {
            
            /*Pour recuperer la couleur de l'image au niveau panier*/
            $couleurCliquerNotExistByNow = $details['couleurs'];


            /*On appel le model de la relation qui est :  CouleurProduit*/
            /*Dans CouleurProduit on recupere l'image ou l'image est egal à l'image qui se trouve au niveau session c a d l'image de la couleur selectionner par le user*/
            $coulProdNotExistByNow = CouleurProduit::where('images', $couleurCliquerNotExistByNow)->
              first();



             /*Pourquoi la condition car si le produit dans la session n'as pas de couleur il renveras null et si $coulProdNotExistByNow est null il nous renveras une erreur.*/
              if ($coulProdNotExistByNow)
              {
                 //si ce qui es en bd est inferieur ace que l'user a selectioner c a d la quantité dans la session on return true
                if ($coulProdNotExistByNow->quantite < $details['quantite']) {
                      return true;
                }
              }
        }
        /*si non si cest ok on return false*/
        return false;
    }




    //Eviter d'acheter un produit dont la taille n'existe plus après arriver au nivo checkout par le button acheter maintenant
    private function checkIfNotAvailableTailleByNow()
    {
        foreach(session('cart') as $id => $details)
        {
           
          //On recupere seulement l'id du produit dans la session
              $idProduit = $details['id'];

            
            /*Pour recuperer la taille du produit dans la session*/
            $tailleCliquerNotExistByNow = $details['tailles'];

            
            
           /*On appel le model de la relation qui est :  ProduitTaille*/
          /*Dans ProduitTaille on recupere la designaion ou taille. ou taille est egal a la tailleCliquerNotExistByNow qui se trouve dans la session c a d la taille selectionner par le user. En meme temps on recupere aussi le produit qui est egal au produit se trouvant dans la session*/
          $tailleProdNotExistByNow = ProduitTaille::where('designation', $tailleCliquerNotExistByNow)->where('produit_id', $idProduit)->
            first();



             /*Pourquoi la condition car si le produit dans la session n'as pas de taille il renveras null et si $tailleProdNotExistByNow est null il nous renveras une erreur.*/
              if ($tailleProdNotExistByNow)
              {
                 //si ce qui es en bd est inferieur ace que l'user a selectioner on return true
                if ($tailleProdNotExistByNow->quantite < $details['quantite']) {
                      return true;
                }
              }
        }
        /*si non si cest ok on return false*/
        return false;
    }


            /*checkIfNotAvailable Pour button acheter maintentant*/











            /*updateStock pour le button panier*/

     //Une function pour decrementer le stock du produit au niveau panier
    private function updateStock()
    {
        //On boucle dans le panier pour recuperer le produit qui est dans le panier
        foreach (Cart::content() as  $item) {

            //On recupere l'id du produit dans le panier
            $produit = Produit::find($item->model->id);

            //On retire le nombre de la quantité qu'on as selectionner
            $produit->update([

                //on prend la qtité en BD on le soustrais par la qtité selectionné dans le panier
                'quantite' => $produit->quantite - $item->qty

            ]);
        }
    }



     //Une function pour decrementer la couleur au niveau panier
    private function updateStockCouleur()
    {
        //On boucle dans le panier pour recuperer le produit qui est dans le panier
        foreach (Cart::content() as  $item)
        {
         /* dd($item);*/

        //On recupere l'id du produit dans le panier et les autres colone
          /*$produit = Produit::find($item->model->id);*/

          /*Pour recuperer la couleur de l'image au niveau panier*/
            $couleurCliquer = $item->options->couleur;

          /*On appel le model de la relation qui est :  CouleurProduit*/
          /*Dans CouleurProduit on recupere l'image ou l'image est egal à l'image qui se trouve au niveau panier c a d l'image de la couleur selectionner par le user*/
          $coulProd = CouleurProduit::where('images', $couleurCliquer)->
            first();

           /*Pourquoi la condition car si le produit dans le panier n'as pas de couleur il renveras null et si $coulProd est null il nous renveras une erreur.*/
            if ($coulProd)
            {
              /*On decremente la quantité*/
                $coulProd->update([
                    /*'quantite' => $coulProd->quantite - 1,*/
                     'quantite' => $coulProd->quantite - $item->qty
                ]);
            }
        }
    }





         //Une function pour decrementer la taille au niveau panier
    private function updateStockTaille()
    {
        //On boucle dans le panier pour recuperer le produit qui est dans le panier
        foreach (Cart::content() as  $item)
        {
           //On recupere seulement l'id du produit dans le panier
              $idProduit = $item->id;
         

          /*Pour recuperer la taille du produit au niveau panier*/
            $tailleCliquer = $item->options->taille;
            

          /*On appel le model de la relation qui est :  CouleurProduit*/
          /*Dans CouleurProduit on recupere la designaion ou taille. ou taille est egal a la taille cliquer qui se trouve au niveau panier c a d la taille selectionner par le user. En meme temps on recupere aussi le produit qui est egal au produit se trouvant dans le panier*/
          $tailleProd = ProduitTaille::where('designation', $tailleCliquer)->where('produit_id', $idProduit)->
            first();


           /*Pourquoi la condition car si le produit dans le panier n'as pas de couleur il renveras null et si $coulProd est null il nous renveras une erreur.*/
            if ($tailleProd)
            {
              /*On decremente la quantité*/
                $tailleProd->update([
                    /*'quantite' => $coulProd->quantite - 1,*/
                     'quantite' => $tailleProd->quantite - $item->qty
                ]);
            }
        }
    }

            /*End updateStock pour le button panier*/









              /*updateStock pour le button acheter maintenant*/

     //Une function pour decrementer le stock du produit pour le bouton acheter maintenant
    private function updateStockByNoW()
    {
        //On boucle dans la session pour recuperer le produit qui est dans la session
        foreach(session('cart') as $id => $details)
        {

            //On recupere l'id du produit dans la session
            $produit = Produit::find($details['id']);

            //On retire le nombre de la quantité qu'on as selectionner
            $produit->update([

                //on prend la quantité en BD on le soustrais par la qtité selectionné dans la session
                'quantite' => $produit->quantite - $details['quantite']

            ]);
        }
    }


    

     //Une function pour decrementer la couleur pour le bouton acheter maintenant
    private function updateStockCouleurByNow()
    {
        //On boucle dans la session pour recuperer le produit qui est dans la session
        foreach(session('cart') as $id => $details)
        {
         /* dd($details);*/

          /*Pour recuperer la couleur de l'image au niveau session*/
            $couleurCliquerByNow = $details['couleurs'];


          /*On appel le model de la relation qui est :  CouleurProduit*/
          /*Dans CouleurProduit on recupere l'image ou l'image est egal à l'image qui se trouve au niveau session c a d l'image de la couleur selectionner par le user*/
          $coulProdByNow = CouleurProduit::where('images', $couleurCliquerByNow)->
            first();

           /*Pourquoi la condition car si le produit dans la session n'as pas de couleur il renveras null et si $coulProdByNow est null il nous renveras une erreur.*/
            if ($coulProdByNow)
            {
              /*On decremente la quantité*/
                $coulProdByNow->update([
                    /*'quantite' => $coulProd->quantite - 1,*/
                     'quantite' => $coulProdByNow->quantite - $details['quantite']
                ]);
            }
        }
    }



     //Une function pour decrementer la taille au niveau de la session
    private function updateStockTailleByNow()
    {
        //On boucle dans la session pour recuperer le produit qui est dans la session
        foreach(session('cart') as $id => $details)
        {

           //On recupere seulement l'id du produit dans le panier
              $idProduit = $details['id'];
         

          /*Pour recuperer la taille du produit au niveau de la session*/
            $tailleCliquerByNow = $details['tailles'];
            

          /*On appel le model de la relation qui est :  CouleurProduit*/
          /*Dans CouleurProduit on recupere la designaion ou taille. ou taille est egal a la tailleCliquerByNow qui se trouve au niveau de la session c a d la taille selectionner par le user. En meme temps on recupere aussi le produit qui est egal au produit se trouvant dans la session*/
          $tailleProd = ProduitTaille::where('designation', $tailleCliquerByNow)->where('produit_id', $idProduit)->
            first();


           /*Pourquoi la condition car si le produit dans la session n'as pas de taille il renveras null et si $coulProd est null il nous renveras une erreur.*/
            if ($tailleProd)
            {
              /*On decremente la quantité*/
                $tailleProd->update([
                    /*'quantite' => $coulProd->quantite - 1,*/
                     'quantite' => $tailleProd->quantite - $details['quantite']
                ]);
            }
        }
    }


          /*End updateStock pour le button acheter maintenant*/


}
