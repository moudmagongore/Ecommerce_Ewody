<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Socialite;


class SocialesController extends Controller
{
    /*login facebook ee*/
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


     public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
            $authUser = User::where('provider_id', $user->id)->first();

            if ($authUser) {
                return $authUser;
            }

            return User::create([
                    'name'  => $user->name,
                    'email' => $user->email,
                    'provider'  => $provider,
                    'provider_id' => $user->id,
                ]);
    }

    /*end login facebook*/

}
