<?php

namespace App\Providers;
use App\Policies\CitationPolicy;
use Gate;
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
        // Gate::define('see-admin-menu', function($user){
        //     return $user->isAdmin();
        // });
        // Gate::define('create', [CitationPolicy::class, 'create']);
        // Gate::define('update', [CitationPolicy::class, 'update']);
        // Gate::define('delete', [CitationPolicy::class, 'delete']);
    }
}
