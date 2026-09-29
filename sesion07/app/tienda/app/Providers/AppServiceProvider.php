<?php

namespace App\Providers;

use App\Gate\ProductAbilities;
use App\Models\User;
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
        Gate::define(
            ProductAbilities::GESTIONAR_PRODUCTOS,
            fn (User $user) => $user->role === 'admin'
        );
    }
}
