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
use App\models\Industrie;
use App\models\Marque;
use App\models\Produit;
use App\models\Privillege;
use App\Models\Service;
use App\models\Taille;
use App\models\Couleur;
use Illuminate\Support\Facades\Auth;
use App\models\Avis;
use App\User;
use App\models\Favori;



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















    /*public function allcategories(){
        $produits = Produit::all();
        $categories = Categorie::all();

        return view('templateclient.pages.allcategorie', compact('produits', 'categories'));
    }*/

    public function allproduits(){

        $produits = Produit::all();
        $sous_categories = SousCategorie::all();
        $industries = Industrie::all();
       /* $marques = Marque::all();*/
       $tailles = Taille::all();
       $couleurs = Couleur::all();
      


        return view('templateclient.pages.allproducts', compact('produits', 'sous_categories','industries',
            'tailles','couleurs'));
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

        //Pour recuperer les avis concernants un produit
        $avis = Avis::where('produit_id', '=', $id)->get();
        
        //On recupere l'id du produit concerné
        $produits = Produit::find($id);


        //Pour recuperer la couleur concernants un produit
        $couleurs = $produits->couleurs;


         //Pour recuperer la tailles concernants un produit
        $tailles = $produits->tailles;


         /*$taille = Taille::find($id);
        $quantiteTaille = $taille->quantite === 0 ? 'Indisponible' : 'Disponible';*/



        //Rendre la quantite disponible
        $quantites = $produits->quantite === 0 ? 'Indisponible' : 'Disponible';

        $images = Image::where('produit_id', $id)->get();

        $caracteristiques = $produits->caracteristiques;
    

        //$prix = $produits->prix_unitaire;
        
        //dd($caracteristiques);
        
        return view('templateclient.pages.detailsproduit', compact('produits', 'images', 'caracteristiques', 'quantites', 'avis', 'couleurs', 'tailles'/*, 'quantiteTaille'*/));
    }

    public function get_mescommandes_page(){
        
        return view('templateclient.pages.mescommandes');
    }

    public function get_mon_compte_page(){

        $user = Auth::user();
        
        $favoris = Favori::OrderBy('created_at', 'DESC')->where('user_id', $user->id)->take(4)->get();
        
        return view('templateclient.pages.compte', compact('user','favoris'));
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

        $industries = Industrie::all();


        return view('templateclient.pages.detailcategorie', compact('categories', 'produits', 'industries'));
    }


    public function get_detail_industrie($id)
    {
            $industries = Industrie::find($id);
           

            $categories = Categorie::with('industrie')->where('industrie_id', $industries->id)->get();



        return view('templateclient.pages.allcategorie', compact('categories'));
        
    
    }

    


    public function contact()
    {
        return view('templateclient.pages.contact');
    }

    public function apropos()
    {
        return view('templateclient.pages.apropos');
    }

    public function faq()
    {
        return view('templateclient.pages.faq');
    }
}
