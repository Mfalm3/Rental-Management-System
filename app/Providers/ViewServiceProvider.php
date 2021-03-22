<?php

namespace App\Providers;

use App\Models\Property;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('users.add', function ($view){
            $view->with('apartments', Property::with('houses')->get()->toArray());
        });
    }
}
