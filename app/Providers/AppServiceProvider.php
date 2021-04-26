<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Cloudinary\Cloudinary;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Cloudinary::class, function (){
            return new Cloudinary(config('services.cloudinary'));
        });

        // Relation morph map
        Relation::morphMap([
            'tenant' => 'App\Models\Tenant',
            'agent' => 'App\Models\Agent',
            'landlord' => 'App\Models\Landlord',
        ]);
    }
}
