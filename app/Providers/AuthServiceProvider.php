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
        $this->registerStoreManagementPolicies();
        $this->registerStorePolicies();
    }

    public function registerStoreManagementPolicies()
    {
        Gate::define('create-store', function ($user) {
            return $user->hasAccess(['create-store']);
        });

        Gate::define('update-store', function ($user) {
            return $user->hasAccess(['update-store']);
        });

        Gate::define('create-branch', function ($user) {
            return $user->hasAccess(['create-branch']);
        });

        Gate::define('update-branch', function ($user) {
            return $user->hasAccess(['update-branch']);
        });

        Gate::define('create-category', function ($user) {
            return $user->hasAccess(['create-category']);
        });

        Gate::define('update-category', function ($user) {
            return $user->hasAccess(['update-category']);
        });

        Gate::define('create-cashier', function ($user) {
            return $user->hasAccess(['create-cashier']);
        });

        Gate::define('update-cashier', function ($user) {
            return $user->hasAccess(['update-cashier']);
        });
    }
    public function registerStorePolicies()
    {
        Gate::define('create-grouping', function ($user) {
            return $user->hasAccess(['create-grouping']);
        });

        Gate::define('update-grouping', function ($user) {
            return $user->hasAccess(['update-grouping']);
        });

        Gate::define('create-product', function ($user) {
            return $user->hasAccess(['create-product']);
        });

        Gate::define('update-product', function ($user) {
            return $user->hasAccess(['update-product']);
        });
    }
}
