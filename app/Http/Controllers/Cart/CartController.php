<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\models\Produit;
use App\models\CouleurProduit;
use App\models\ProduitTaille;

use App\models\Coupon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Pour recuperer la quantité de la couleur, taille  dans le panier et le passé dans le vue*/
        foreach (Cart::content() as $item)
        {   
            /*Pour la couleur*/
            $couleurCliquerNotExist = $item->options->couleur;

           
            $coulProdNotExist = CouleurProduit::where('images', $couleurCliquerNotExist)-> first();
            /*End Pour la couleur*/






            /*Pour la taille*/
             //On recupere seulement l'id du produit dans le panier
              $idProduit = $item->id;

            /*Pour recuperer la taille du produit au niveau panier*/
            $tailleCliquerNotExist = $item->options->taille;


            $tailleProdNotExist = ProduitTaille::where('designation', $tailleCliquerNotExist)->where('produit_id', $idProduit)->
            first();
            /*End Pour la taille*/






               $user = Auth::user();
                return view('templateclient.pages.panier', compact('user', 'coulProdNotExist', 'tailleProdNotExist'));
        }
        $user = Auth::user();
        return view('templateclient.pages.panier', compact('user'));
        


       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //Pour eviter d'ajouter deux fois le meme produit
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->produits_id;
        });

       /* dd($duplicata);*/

        /*if ($duplicata->isNotEmpty()) {

          flashy()->error('Le produit à déjà été ajouté au panier !');
          return back();
        }*/

       

        //Pour recuperer la taille concernants un produit
        $tailles = $request->tailles;

        //Pour recuperer la quantite concernants un produit
        $quantites = $request->quantites;

         //Pour recuperer la couleur concernants un produit
        /*$couleurs = $request->file('couleurs');*/
         $couleurs = $request->couleurs;

         //Pour recuperer l'id du produit concerné
         $produit = Produit::find($request->produits_id);




          if ($duplicata->isNotEmpty()) {

            Cart::destroy($duplicata);

            Cart::add($produit->id, $produit->nom, $quantites, $produit->prix_unitaire, ['taille' => $tailles, 'couleur' => $couleurs])
            ->associate('App\models\Produit');


            flashy('Le produit à bien été ajouté au panier');

              return back();
        }

         
        Cart::add($produit->id, $produit->nom, $quantites, $produit->prix_unitaire, ['taille' => $tailles, 'couleur' => $couleurs])
        ->associate('App\models\Produit');

       /* dd(Cart::content());*/

        

        flashy('Le produit à bien été ajouté au panier');

        return back();


    }


    public function acheter(Request $request)
    {

        //Pour recuperer l'id du produit concerné
         $produit = Produit::find($request->produits_id);


        $quantites = $request->quantitesAchat;

        $couleurs = $request->couleurAchat;

        $tailles = $request->tailleAchat;

       /* dd($quantites);*/


         //On crée une session qui a pour nom 'cart' on le met dans $cart
        $cart = session()->get('cart');

        // if cart is empty then this the first product
       /* if($cart) {*/

            $cart = [
                   $request->produits_id => [
                        "id" => $produit->id,
                        "nom" => $produit->nom,
                        "quantite" => $quantites,
                        "prix_unitaire" => $produit->prix_unitaire,
                        "photo" => $produit->photo,
                        "tailles" => $tailles,
                        "couleurs" => $couleurs,
                    ]
            ];

            /*dd($cart);*/

            session()->put('cart', $cart);
          /* session()->forget('cart');*/

            $users = Auth::user();

            if ($users)
            {
               return redirect()->route('checkout.achat');
            
            }
            else
            {
                return redirect()->route('checkout.achatInvite');
            }



             
       /* }*/

    }



    public function storeCoupon(Request $request)
    {
        //On recupere le code que l'user a saisi
        $code = request()->get('code');

         //Dans coupon on recupere le code ou le code = au code que l'user a saisi
        $coupon = Coupon::where('code', $code)->first();

        //Dans le cas on ne trouve pas de coupon
        if (!$coupon)
        {
          flashy()->error('Le coupon est invalide.');
          return back();
        }

        //Dans le cas ou le coupon est valide
        /*On recupere notre request on appel la session 
        et on crée une nouvell session qui a pour clé 'coupon'
        et qui aura comm valeur le tableau
        et le tableau aura le code du coupon et en meme temps la remise
        */
        $request->session()->put('coupon', [

            'code' => $coupon->code,
            'remise_en_pourcentage' => $coupon->discount(Cart::subtotal())
       ]);

          flashy()->success('Le coupon est appliqué.');
          return back();

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        //On recupere les data dans le request
        $data = $request->json()->all();

        //une validation Pour empecher les utilisateurs a saisir plus de 50 select
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,50'
        ]);

        if($validator->fails())
        {
            /*Session::flash('danger', 'La quantité du produit ne doit pas dépasser 50.');

            return response()
            ->json(['error' => 'Cart Quantity Has Not Been Updated']);*/

             flashy()->error('La quantité du produit ne doit pas dépasser 50.');

             return response()
            ->json(['error' => 'Cart Quantity Has Not Been Updated']);
        }

        //Pour gerer le stock en bd avec le select de l'user
        if ($data['qty'] > $data['quantite'])
        {           
            /*Session::flash('danger', 'La quantité de ce produit n\'est pas disponible.');

            return response()
            ->json(['error' => 'Product Quantity Not Available']);*/

             flashy()->error('La quantité de ce produit n\'est pas disponible.');

             return response()
            ->json(['error' => 'Product Quantity Not Available']);
        }



        Cart::update($rowId, $data['qty']);

        flashy()->success('La quantité du produit est passé à ' . $data['qty'] . '.');

        return response()
            ->json(['success' => 'Cart Quantity Has Been Updated']);
    }

    /*public function quantite(Request $request, $id)
    {
        $data = $request->json()->all();

        Cart::update($id, $data['tailles']);

         flashy()->success('La taille du produit est passé à ' . $data['tailles'] . '.');

        return response()
            ->json(['success' => 'Cart Quantity Has Been Updated']);
    }*/


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        flashy()->error('Le produit à bien été supprimé');
        return back();
    }

    


    public function destroyCoupon()
    {
        request()->session()->forget('coupon');

        flashy()->error('Le coupon a bien été rétiré.');
          return back();
    }
}
