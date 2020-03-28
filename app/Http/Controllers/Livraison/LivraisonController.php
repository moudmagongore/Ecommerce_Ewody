<?php

namespace App\Http\Controllers\Livraison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Livraison;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livraisons = Livraison::where('status', '=', 1)->get();
        return view('templateadmin.livraison.list', compact('livraisons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templateadmin.livraison.add');
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
            'date_livraison' => 'required',
            'montant'=> 'required' , 
            'quantite'=> 'required' , 
            'commande'=> 'required' , 
            'produit'=> 'required' 
            
        ]);

        //dd('vraiment');
        $status = 1;
        Livraison::create([
            'date_livraison_reelle' =>$request->date_livraison ,
            'montant' => $request->montant ,
            'quantite' => $request->quantite ,
            'commande_id' => $request->commande ,
            'produit_id' => $request->produit,
            'status'  => $status
        ]);

        return redirect()->back();
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
        $livraisons = Livraison::find($id);
        return view('livraison.edit', compact('livraisons'));
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
        $this->validate($request, [
            'date_livraison' => 'required',
            'montant'=> 'required' , 
            'quantite'=> 'required' , 
            'commande'=> 'required' , 
            'produit'=> 'required' 
        ]);
        Livraison::whereId($id)->update([
            'date_livraison_reelle' =>$request->date_livraison ,
            'montant' =>$request->montant ,
            'quantite' =>$request->quantite ,
            'commande_id' =>$request->commande ,
            'produit_id' =>$request->produit 
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livraison::destroy($id);
        return redirect()->back();

    }


    public function archiver(Request $request ,$id){
        $status = 0;

        Livraison::whereId($id)->update([
            'status' => $status
        ]);

        return Redirect()->back();
    }
}
