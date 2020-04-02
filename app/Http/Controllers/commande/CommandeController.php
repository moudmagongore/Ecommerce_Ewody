<?php

namespace App\Http\Controllers\commande;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Commande;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       /*$commandes = Commande::where('statut', 0)->get();*/
       $commandes = Commande::all()/*->orderBy('created_at', 'DESC')*/;
        return view('templateadmin.commande.list', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commande.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'date_commande' =>'required',
            'montant' =>'required',
            'date_echeance' =>'required',
            'adresse_livraison' =>'required',
            'quantite_produit' =>'required',
            'status' =>'required'

        ]);
        Commande::create([
            'date_commande' =>$request->date_commande,
            'montant' =>$request->montant,
            'date_echeance' =>$request->date_echeance,
            'adresse_livraison' =>$request->adresse_livraison,
            'quantite_produit' =>$request->quantite_produit,
            'status' =>$request->status

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commandes = Commande::find($id);
        return view('commande.show', compact('commandes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commandes = Commande::find($id);
        return view('commande.edit', compact('commandes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Commande::whereId($id)->update([
           $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commande::destroy($id);
    }






     public function getStatutCommande($id)
    {
        //si sa retourne vrai c a d l'user na pas admin  dans ses roles
        if (Gate::denies('edit-users')) {
            
            return redirect()->route('acceuil');
        }
    
        $commande = Commande::find($id);

        /*
            0 = Commande En cours
            1 = Commande Terminée
            2 = Commande Annulée
        */

        if($commande->statut == 0)
        {
            $commande->statut = 1;
        }
        else
        {
            /*$commande->statut = 0;*/
        }

        $commande->save();

        return back();
    }
}
