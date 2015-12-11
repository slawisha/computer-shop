<?php namespace App\Providers;

use App\Category;
use App\Manufacturer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['products.partials.form','partials.nav','partials.sidebar'], function($view)
        {
            $view->with('categories', Category::lists('name','id'));
            $view->with('manufacturers', Manufacturer::lists('name','id'));
        });

	}

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
