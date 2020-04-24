<?php

namespace App\Http\Controllers\Industries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Industrie;

class IndustrieController extends Controller
{
    public function storeIndustrie(Request $request)
    {
    	$this->validate($request, [
            'designation_industrie' => 'required'
        ]);

        Industrie::create([
        	
            'designation_industrie' => $request->designation_industrie
        ]);

        flashy('Industrie bien ajouté.');
        return back();
    }
}
