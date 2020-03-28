<?php

namespace App\Http\Controllers\Categorie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\SousCategorie;

class SouscategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $souscategories = SousCategorie::all();
        return view('categorie.list', compact('souscategories'));
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
            'designation_type' => 'required',
            'designation_categorie' => 'required'
        ]);

        SousCategorie::create([
            'designation_s_categorie' => $request->designation_type,
            'categorie_id' => $request->designation_categorie
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
            'designation_type' => 'required',
            'designation_categorie' => 'required'         
        ]);
        SousCategorie::whereId($id)->update([
            'designation_s_categorie' => $request->designation_type,
            'categorie_id' => $request->designation_categorie
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
        SousCategorie::destroy($id);
        return redirect()->back();
    }
}
