<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //seulement admin peut editer les users
        Gate::define('edit-users', function ($user) {
            return $user->isAdmin();
        });

       //seulement admin  peut voir la page liste users
        Gate::define('voir-page-admin', function ($user){
            return $user->hasAnyRole(['Administrateur']);
        });

        //seulement admin  et vendeur peut voir la page produit
        Gate::define('voir-page-admin-vendeur', function ($user){
            return $user->hasAnyRole(['Administrateur', 'Vendeur']);
        });
    }
}
