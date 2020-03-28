<?php

namespace App\Http\Controllers\Produit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Produit;
use App\models\Categorie;
use App\models\Image;
use App\models\Video;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        //$produit = Produit::find($id);

       // $image = Image::where('produit_id', '=', $produit->id)->get();
        
        return view('templateadmin.produit.list', compact('produits'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();
        $categories = Categorie::all();
        return view('templateadmin.produit.add', compact('produits', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([

            'image' => ['required', 'image'],
            'nom' => ['required'],
            'prix_maximum' => ['required'],
            'marque' => ['required'],
            'fournisseur' => ['required'],
            'description' => ['required'],
            'marque' => ['required'],
            'prix_unitaire' => ['required'],
            'quantite' => ['required'],
            'titre_video' => ['required']
        ]);


               
        $inputData=$request->all();
        
        if($request->file('image')){
            
            $images=$request->file('image');

                $path = request('image')->store('avatars_produits', 'public');

                if($images->isValid()){

                   /* $images->storeAs('pics',$path);*/
                    $inputData['photo']=$path;
                    /*$inputData['status']=1;*/
                    $inputData['fournisseur_id'] = Auth()->user()->id;
                    $prod = Produit::create($inputData);



                    $prod->categories()->attach(request('categorie'));
                }
        }
        
        
        flashy('Le produit a bien été ajouté.');
        return back();


       
        /* $this->validate($request, [
            'nom' => 'required',
            'description' => 'required',
            'prix_unitaire' => 'required',
            'prix_maximum' => 'required',            
            'quantite' => 'required',
            'fournisseur'  => 'required',
            'fabricant' => 'required',
            'titre_video'  => 'required',
            'photo' => 'required'                   
        ]); */

       // dd('salut');

       
       
       /* if($request->hasFile('image')){
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid().'.'.$ext;
        $image->storeAs('public/pics',$filename);
        //Storage::delete("public/pics/{$client->image}");
        //$client->image = $filename;
    }

        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'fabricant' => $request->fabricant,
            'status' => $status,
            'quantite' => $request->quantite,
            'fournisseur_id' => $request->fournisseur,
            'prix_unitaire' => $request->prix_unitaire,
            'prix_maximum' => $request->prix_maximum,
            'titre_video' => $request->lien,
            'photo' => $filename
        ]);

      */   //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produits = Produit::find($id);
        return view('produit.show', compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produits = Produit::find($id);
        return view('produit.edit', compact('produits'));
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
            'nom' => 'required',
            'description' => 'required',
            'prix_unitaire' => 'required',
            'prix_maximum' => 'required',            
            'quantite' => 'required',
            'fournisseur'  => 'required',
            'fabricant' => 'required',
            'titre_video'  => 'required',
            'status' => 'required'                  
        ]);
        Produit::whereId($id)->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'fabricant' => $request->fabricant,
            'status' => $request->status,
            'quantite' => $request->quantite,
            'fournisseur_id' => $request->fournisseur,
            'prix_unitaire' => $request->prix_unitaire,
            'prix_maximum' => $request->prix_maximum,
            'titre_video' => $request->lien
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
        Produit::destroy($id);
        return redirect()->route('listproduit');
    }
}
