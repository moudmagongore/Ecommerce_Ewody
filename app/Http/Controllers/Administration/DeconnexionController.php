<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeconnexionController extends Controller
{
     public function deconnexion()
    {
    	Auth()->logout();

        flashy('Vous êtes déconnecté.');

    	return redirect()->route('connexion');

    }
}
