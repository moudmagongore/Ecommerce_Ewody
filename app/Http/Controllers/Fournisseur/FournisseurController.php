<?php

namespace App\Http\Controllers\Fournisseur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Fournisseur;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class FournisseurController extends Controller
{ 
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $fournisseurs = Fournisseur::where('statut', '!=', 'archivé')->get();
       return view('templateadmin.fournisseur.list', compact('fournisseurs'));
   }

   
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('templateadmin.fournisseur.add');
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
        'nom' =>'required',
        'prenom' =>'required',
        'telephone' =>'required',
        'email' =>'required|email',
        'adresse' =>'required',
        'password' =>'required|confirmed',
       ]);
       Fournisseur::create([       
           'nom' =>$request->nom,
           'prenom' =>$request->prenom,
           'telephone' =>$request->telephone,
           'email' =>$request->email,
           'adresse' =>$request->adresse,
           'motdepass' => Hash::make($request->motdepass),
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
       $fournisseurs = Fournisseur::find($id);
       return view('fournisseur.show', compact('fournisseurs'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $fournisseurs = Fournisseur::find($id);
       return view('fournisseur.edit', compact('fournisseurs'));
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
       Fournisseur::whereId($id)->update([
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
       //
   }

   public function archiver( $id)
   {
       $status = 'archivé';
       Fournisseur::whereId($id)->update([
           'status' => $status
       ]);

       return Redirect()->back();
   }


}
