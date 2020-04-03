<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Caracteristique;
use App\models\Categorie;
use App\models\Client;
use App\models\Image;
use App\models\Imagemodel;
use App\models\SousCategorie;
use App\Models\Industrie;
use App\models\Marque;
use App\models\Produit;
use App\models\Privillege;
use App\Models\Service;
use App\models\Taille;
use Illuminate\Support\Facades\Auth;
use App\User;



class AccueilController extends Controller
{
    public function index(){

        
        /* Produit::find($id)->images() */ 
        $categories = Categorie::all();
        $sous_categories = SousCategorie::all();
        $caracteristiques = Caracteristique::all();
        $industries = Industrie::all();
        /*$images = Imagemodel::where('code_photo', '=', 1)->get();*/
        $produits = Produit::all();

        $categori = Categorie::where('designation_categorie', 'produits phares')->firstOrFail();

       /* $category = Categorie::find(7);*/
       $category = Categorie::where('designation_categorie', 'montre')->firstOrFail();

      /* $categorys = Categorie::find(5);*/
      $categorys = Categorie::where('designation_categorie', 'sacs')->firstOrFail();
     
      $produits_phare = $categori->produits;
      $produits_montre =  $category->produits;
      $produits_sacs =  $categorys->produits;

        return view('templateclient.pages.index', compact('categories', 
        'sous_categories', 
        'caracteristiques' ,
        'industries' ,
        'produits_montre',
        /*'images',*/
        'produits_sacs',
        'produits_phare'
        ));
    }















    public function allcategories(){
        $produits = Produit::all();
        $categories = Categorie::all();

        return view('templateclient.pages.allcategorie', compact('produits', 'categories'));
    }

    public function allproduits(){

        $produits = Produit::all();
        $sous_categories = SousCategorie::all();
        $tailles = Taille::all();
        $industries = Industrie::all();
       /* $marques = Marque::all();*/


        return view('templateclient.pages.allproducts', compact('produits', 'sous_categories','industries',
            'tailles',/*'marques'*/));
    }


    public function produitphare(){
        
    }


    public function get_profile_page(){
       
        $user = Auth::user();
        
        
        return view('templateclient.pages.profile', compact('user'));
    }

    /*public function get_connexion_page(){
        return view('templateclient.pages.connexion');
    }*/

    public function get_details_page($id){

        $produits = Produit::find($id);

        $quantites = $produits->quantite === 0 ? 'Indisponible' : 'Disponible';

        $images = Image::where('produit_id', $id)->get();

        $caracteristiques = $produits->caracteristiques;
    

        //$prix = $produits->prix_unitaire;
        
        //dd($caracteristiques);
        
        return view('templateclient.pages.detailsproduit', compact('produits', 'images', 'caracteristiques', 'quantites'));
    }

    public function get_mescommandes_page(){
        $user = Auth::user();
        
        return view('templateclient.pages.mescommandes', compact('user'));
    }

    public function get_mon_compte_page(){
        $user = Auth::user();
        /*dd($user);*/
        return view('templateclient.pages.compte', compact('user'));
    }

    

   
    //ajout user client
    public function inscription(){
        return view('templateclient.pages.inscription');
    }

    public function storeInscription(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|min:2',
            'motdepass' => 'required|min:2'
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->motdepass),
           
        ]);


        /*pour donner un role en créant l'utilisateur*/

        //On recupere l'id du role utilisateur
        $privilleges = Privillege::select('id')->where('designation_privillege', 'utilisateur')->first();

        //On attache l'id du role utilisateur a notre users
        $users->privilleges()->attach($privilleges);

        /*End pour donner un role en créant l'utilisateur*/


        flashy('Votre compte à été bien enregistré.');
        return redirect()->route('acceuil');
    }
    //End ajout user client




   /* public function get_checkout()
    {
        return view('templateclient.pages.checkout');
    }*/


    public function get_detail_categorie()
    {
        if (request()->category) {

            $produits = Produit::with('categories')->whereHas('categories', function($query){

                $query->where('designation_categorie', request()->category);
            })->paginate(4);
        }
        else{

            $produits = Produit::with('categories')->paginate(4);
        }
        
        $categories = Categorie::all();


        return view('templateclient.pages.detailcategorie', compact('categories', 'produits'));
    }

    
}
