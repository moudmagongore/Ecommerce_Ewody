<?php

namespace App\Http\Controllers\commande;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Commande;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::all();
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
}
