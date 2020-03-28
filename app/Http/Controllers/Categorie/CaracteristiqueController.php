<?php

namespace App\Http\Controllers\Categorie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Caracteristique;

class CaracteristiqueController extends Controller
{
    
    public function store(Request $request){

        $this->validate($request,[
            'designation_caracteristique' => 'required',
            'valeur_caracteristique' => 'required'
        ]);


        Caracteristique::create([
            'designation' => $request->designation_caracteristique,
            'valeur' => $request->valeur_caracteristique
            ]);

            return redirect()->back();
    }


    public function update(Request $request, $id){
        $this->validate($request,[
            'designation_caracteristique' => 'required',
            'valeur_caracteristique' => 'required'
        ]);


        Caracteristique::whereId($id)->update([
            'designation' => $request->designation_caracteristique,
            'valeur' => $request->valeur_caracteristique
            ]);

            return redirect()->back();

    }

    public function destroy($id){
        Caracteristique::destroy($id);
        return redirect()->back();
    }
}
