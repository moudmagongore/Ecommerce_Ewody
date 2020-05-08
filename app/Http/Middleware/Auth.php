<?php

namespace App\Http\Middleware;

use Closure;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->guest() || auth()->user()->statut == 0)
        {
           /* return redirect()->route('connexion')->withInput()->with('danger', 'Vous devez être connecté pour voir cette page.');*/
            
           flashy("Vous devez être connecté pour voir cette page."); 
            return redirect()->intended('connexion');
        }

        
        return $next($request);
    }
}
