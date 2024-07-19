<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Définition des Gates
        Gate::define('manage-vehicles', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant');
        });

        Gate::define('view-vehicles', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant') || $user->hasRole('controleur') || $user->hasRole('mecanicien') || $user->hasRole('magasinier') || $user->hasRole('pompiste');
        });


        Gate::define('manage-sorties', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-sorties', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant') || $user->hasRole('controleur');
        });

        Gate::define('manage-approvisionnements', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-approvisionnements', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('pompiste');
        });

        Gate::define('manage-maintenances', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-maintenances', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('controleur') || $user->hasRole('mecanicien') || $user->hasRole('magasinier');
        });

        Gate::define('manage-magasins', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-magasins', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('mecanicien') || $user->hasRole('magasinier');
        });

        Gate::define('manage-achats', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-achats', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('manage-affectations', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-affectations', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

        Gate::define('view-documents', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant');
        });

        Gate::define('view-assurances', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant');
        });

        Gate::define('view-visite-techniques', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant');
        });

        Gate::define('view-tvms', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service') || $user->hasRole('exploitant');
        });

        Gate::define('access-dashboard', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('chef_service');
        });

    }
}
