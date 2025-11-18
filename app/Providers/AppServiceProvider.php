<?php

namespace App\Providers;
use App\Policies\CitationPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('see-admin-menu', function($user){
            return $user->isAdmin();
        });
        Gate::define('see-create-citation', function($user){
            return $user->isAuthor() || $user->isAdmin();
        });
        Gate::define('see-edit-citation', function($user, $citation){
            return $user->isAuthor() || $user->isAdmin();
        });
        Gate::define('see-delete-citation', function($user, $citation){
            return $user->isAuthor() || $user->isAdmin();
        });



        Gate::define('see-lecteur-menu', function($user){
            return $user->isLecteur();
        });

    }
}
