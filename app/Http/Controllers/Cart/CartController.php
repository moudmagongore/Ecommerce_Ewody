<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\models\Produit;
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

        if ($duplicata->isNotEmpty()) {

          flashy()->error('Le produit à déjà été ajouté !');
          return redirect()->route('acceuil');
        }

         $produit = Produit::find($request->produits_id);

    
        Cart::add($produit->id, $produit->nom, 1, $produit->prix_unitaire)
        ->associate('App\models\Produit');

        flashy('Le produit à bien été ajouté');
        return redirect()->route('acceuil');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        flashy()->error('Le produit à été supprimé');
        return back();
    }
}
