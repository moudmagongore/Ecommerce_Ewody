<?php

namespace App\Http\Controllers\Auth;

/*use Auth;*/
/*use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User;*/

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
         return view('templateclient.pages.logins');
    }

    public function postLogin()
    {
        request()->validate([

            'email' => ['required'],
            'password' => ['required'],

        ]);

        /*$resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);*/

       /* dd($resultat);*/

       

        if(auth()->attempt(['name' => request('email'), 'password' => request('password')]))
        {
             $user = Auth::user();

            if($user->statut == 1)
            {

                if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('accueil.back');
                }
                else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
                {

                    flashy('Vous êtes bien connecté.');
                    return redirect()->route('accueil.back');
                }
                else
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('acceuil');
                }
            }

            flashy()->error('Vous êtes suspendus.');
            return back();
        }
        elseif(auth()->attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();

            if($user->statut == 1)
            {

                if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('accueil.back');
                }
                else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
                {

                    flashy('Vous êtes bien connecté.');
                    return redirect()->route('accueil.back');
                }
                else
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('acceuil');
                }
            }

            flashy()->error('Vous êtes suspendus.');
            return back();
        }
        elseif(auth()->attempt(['telephone' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();

            if($user->statut == 1)
            {

                if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('accueil.back');
                }
                else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
                {

                    flashy('Vous êtes bien connecté.');
                    return redirect()->route('accueil.back');
                }
                else
                {
                    flashy('Vous êtes bien connecté.');
                     return redirect()->route('acceuil');
                }
            }

            flashy()->error('Vous êtes suspendus.');
            return back();
        }
        else
        {
            flashy()->error('Vos identifiants sont incorrects.');
            return back();
        }   
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


   /* protected function redirectTo()
    {
        //Est ce que sa contient admin
        if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Administrateur'))
        {
             flashy('Vous êtes bien connecté.');
            return 'accueil.back';
        }
        else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Utilisateur'))
        {
            flashy('Vous êtes bien connecté.');
             return '/';
        }
         else if(Auth::user()->privilleges()->pluck('designation_privillege')->contains('Vendeur'))
        {
            flashy('Vous êtes bien connecté.');
             return 'accueil.back';
        }
    }*/


    public function redirectTo()
    {
         return session('url.intended') ?? $this->redirectTo;
    }
}
