<?php

namespace App\Http\Controllers\produit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Caracteristique;
use App\models\Categorie;
use App\models\Imagemodel;
use App\models\Image;
use App\models\Produit;
use App\models\SousCategorie;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // $images =  Image::where('produit_id', '=', $id)->get();

     // return view('templateadmin.produit.image', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $produits =  Produit::all();
       $images = Image::all();
       $categories = Categorie::all();
       $sous_categories = SousCategorie::all();
       $caracteristiques = Caracteristique::all();

       return view('templateadmin.produit.image', compact('produits','images', 'categories', 'sous_categories', 'caracteristiques'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    
        $path = request('image')->store('avatars_sousImagesProduit', 'public');

          Image::create([
            'produit_id' => $request->produits,
            'images' => $path,
            
        ]);
        
    
        
        flashy('Le produit a bien été ajouté.');
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
    public function update(Request $request, $id)
    {
        //
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
}
