<?php

namespace App\Providers;

use App\Repositories\Store\EloquentStore;
use App\Repositories\Store\StoreRepository;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StoreRepository::class, EloquentStore::class);

        Relation::morphMap([
            'Receipt' => 'App\Receipt',
        ]);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
