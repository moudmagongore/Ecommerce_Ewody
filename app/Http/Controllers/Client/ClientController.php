<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('status', '!=', 'archiver')->get();
        return view('templateadmin.client.list', compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            
            
            'email' => 'required|email',
            'motdepass' => 'required',
            'login' => 'required',
            'mot_de_pass_confirm' => 'required',
        ]);

        $status = 'simple';

        Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'motdepass' => $request->motdepass,
            'adresse' => $request->adresse,
            'login' => $request->login,
            'mot_de_pass_confirm' => $request->confirm,
            'status' => $status
        ]);
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
    /* public function update(Request $request, $id)
    {

        $this->validate($request, [
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $client = Client::find($id);

       if ($request->hasFile('file')) {
        $image = $request->file;
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid().'.'.$ext;
        $image->storeAs('public/pics',$filename);
        Storage::delete("public/pics/{$client->photo}");
        $client->photo = $filename;
       
        Client::whereId($id)->update([

            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'photo' => $name,
            'motdepass' => $request->motdepass,
            'adresse' => $request->adresse,
            'login' => $request->name,
            'mot_de_pass_confirm' => $request->confirm,
       ]);
        }
       return redirect()->back();
    } */

    public function updatet(Request $request, $id){
        $rules = [
            'login'     => 'required|string|min:3|max:191',
            'email'    => 'required|email|min:3|max:191',
            'motdepass' => 'nullable|string|min:5|max:191',
            'image'    => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ];
        $request->validate($rules);
        $client = Client::find($id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->telephone = $request->telephone;
        $client->adresse = $request->adresse;
        $client->login = $request->login;
        $client->mot_de_pass_confirm = $request->confirm;
        $client->email = $request->email;

        if($request->hasFile('image')){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $image->storeAs('public/pics',$filename);
            //Storage::delete("public/pics/{$client->image}");
            $client->image = $filename;
        }
        if($request->motdepass){
            $client->motdepass = Hash::make($request->motdepass);
        }
        $client->save();
        return redirect()
            ->back()
            ->with('status','Votre profile a été modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->back();
    }

    public function archiver(Request $request , $id)
    {
        $status = 'archiver';
      
       Client::whereId($id)->update([
            'status' => $status
       ]);

       return Redirect()->back();
    }
}
