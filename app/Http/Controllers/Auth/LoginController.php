<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function getLogin()
    {
         return view('templateclient.pages.connexion');
    }

    public function postLogin()
    {
        request()->validate([

            'email' => ['required'],
            'password' => ['required'],

        ]);

        $resultat = auth()->attempt([

            'email' => request('email'),
            'password' => request('password'),
        ]);

        $user = Auth::user();

        if($resultat)
        {
            if($user->statut == 1)
            {

                if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('ajoutproduit');
                }
                else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
                {

                    flashy('Vous êtes bien connecté.');
                    return redirect()->route('ajoutproduit');
                }
                else
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('acceuil');
                }

                

                /*return redirect()->route('acceuil')->withInput()->with('success', 'Vous êtes bien connecté.');*/
            }

            /*withInput renvoie a la page precedente avec les données saisie par le user*/
            return back()->withInput()->with('danger', 'Vous êtes suspendus.');
         }


        return back()->withInput()->with('danger', 'Vos identifiants sont incorrects.');
        
    }
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     
    protected $redirectTo = '/acceuil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');        
    }


    protected function redirectTo()
    {
        //Est ce que sa contient admin
        if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
        {
             flashy('Vous êtes bien connecté.');
            return '/ajoutproduit';
        }
        else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Utilisateur'))
        {
            flashy('Vous êtes bien connecté.');
             return '/acceuil';
        }
         else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
        {
            flashy('Vous êtes bien connecté.');
             return '/ajoutproduit';
        }
    }
}
