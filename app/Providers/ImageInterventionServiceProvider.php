<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageInterventionServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->bind('ImageIntervention', 'App\Services\ImageIntervention');
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
