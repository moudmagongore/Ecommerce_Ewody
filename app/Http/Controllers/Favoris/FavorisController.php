<?php

namespace App\Http\Controllers\Favoris;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\Favori;
use App\models\Produit;


class FavorisController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('templateclient.pages.favori', compact('user') );
    }

    public function store(Request $request, $id)
    {
        $favoris = new Favori();
    	$favoris->user_id = Auth()->user()->id;




    	$favoris->save();

    	flashy('Favoris bien ajouté !');
    	return back();
    }
}
