<?php

namespace App\Http\Controllers\Categorie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Categorie;
use App\models\SousCategorie;
use App\models\Caracteristique;
use App\models\Image;
use App\Models\Industrie;
use App\Models\Service;
use App\models\Produit;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $sous_categories = SousCategorie::all();
        $caracteristiques = Caracteristique::all();
        $industries = Industrie::all();
        $services = Service::all();
        $produit = Produit::all();
        

        return view('templateadmin.produit.categorie', compact('categories', 'sous_categories', 'caracteristiques', 'industries','services','produit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');
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
            'designation_categorie' => 'required'
        ]);

        /* $path = request('image')->store('avatars_categories', 'public');*/

         //
            $image = request('image');

            $ext = $image->getclientOriginalExtension();
            $filename = uniqid().'.'.$ext;

            $path = $image->storeAs('avatars_categories', $filename, 'public_uploads');
         //

        Categorie::create([
            'statut' => 1,
            'industrie_id' => $request->industrie,
            'designation_categorie' => $request->designation_categorie,
            'image' => $path
        ]);


        flashy('La catégorie est bien ajouté.');

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
        $this->validate($request, [
            'designation_categorie' => 'required'
        ]);

        

        Categorie::whereId($id)->update([
            'designation_categorie' => $request->designation_categorie
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
        Categorie::destroy($id);
        return redirect()->back();
    }
}
