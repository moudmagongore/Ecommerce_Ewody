<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\models\Privillege;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/adduser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'motdepass' => 'required|string|min:6',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['motdepass']),
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telephone' => $data['telephone'],
            'adresse' => $data['adresse'],
            'privillege_id' => $data['privilege'],
        ]);

        return redirect()->back();
    }

    //ajout user partis back end
    public function add()
    {
        $privilleges = Privillege::all();
        return view('auth.register', compact('privilleges'));
    }


    public function store(Request $request){

       /* $status = 'actif';*/

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->motdepass),
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'privillege_id' => $request->privilege,
            /*'status' => $status*/
        ]);


        /*pour donner un role en créant l'utilisateur*/

        //On recupere l'id du role utilisateur
        /*$privilleges = Privillege::select('id')->where('designation_privillege', 'utilisateur')->first();*/

        //On attache l'id du role utilisateur a notre users
        /*$users->privilleges()->attach($privilleges);*/

        /*End pour donner un role en créant l'utilisateur*/


    /*pour laisser un choix a l'admin de donner l'user un role*/
        $users->privilleges()->attach(request('privilege'));
    /*End pour pour laisser un choix a l'admin de donner l'user un role*/


        flashy('L\'utilisateur a bien été ajouté.');
        return redirect()->route('listuser');
    }

    public function index()
    {

        //si sa retourne vrai c a d l'user na pas admin dans ses roles il nes pas administrateur
        if(Gate::denies('edit-users'))
        {
            return redirect()->route('listuser');
        }


       /* $users = User::where('status', '!=', 'archivé')->get();*/
        $users = User::all();
        $privilleges = Privillege::all();

        return view('templateadmin.user.list', compact('users', 'privilleges'));

    }



    public function update(Request $request, $id){

        //si sa retourne vrai c a d l'user na pas admin dans ses roles il nes pas administrateur
        if(Gate::denies('edit-users'))
        {
            return redirect()->route('listuser');
        }

        /*$data = $this->validate($request, [
            'name' => 'required|min:2',
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|min:2',
            'email' => 'required|min:2',
            'password' => 'required|min:2',
            'adresse' => 'required|min:2'
            
        ]);*/

        $users = User::findOrFail($id);

        //On recupere le user, on appel la function privilleges() qui fait appel a la relation many to many et on utilise la function sync puisqu'on vas lui passer un tableau
         //$request->privilleges : pour recuperer le privillege que l'utlisateur à deja
         $users->privilleges()->sync($request->privilleges);

         $users->update([
            'name' => $request->name,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->motdepass),
            'adresse' => $request->adresse
        ]);

        flashy('L\'utilisateur a bien été modifié.');
        return back();
    }

    public function bloquer($id){
        $status = 'bloquer';

        User::whereId($id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        User::destroy($id);
        
        return redirect()->back();

    }

    public function archiver($id){
        $status = 'archivé';

        User::whereId($id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }


    public function updatet(Request $request){
        

        $rules = [
            'name'     => 'required|string|min:3|max:191',
            'nom'     => 'required|string|min:3|max:191',
            'prenom'     => 'required|string|min:3|max:191',
            'telephone'     => 'required|string|min:3|max:191',
            'adresse'     => 'required|string|min:3|max:191',
            'email'    => 'required|email|min:3|max:191',
            'password' => 'nullable|string|max:191|confirmed',
            'image'    => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ];


        $request->validate($rules);
        
        $user = Auth::user();
       
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        
        if($request->hasFile('image')){
            
            $path = request('image')->store('avatars_profile', 'public');
            /*$image = $request->image;
            $ext = $image->getclientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $image->storeAs('public/pics',$filename)*/;
           
            $user->photo = $path;
        }

        $user->save();

        flashy("Votre profile à bien été mis à jour !");

        return back();
    }




    public function getStatut($id)
    {
        //si sa retourne vrai c a d l'user na pas admin ou auteur dans ses roles
        if (Gate::denies('edit-users')) {
            
            return redirect()->route('listuser');
        }
    
        $user = User::find($id);

        if($user->statut == 0)
        {
            $user->statut = 1;
        }
        else
        {
            $user->statut = 0;
        }

        $user->save();

        return back();
    }

}
