<?php

namespace App\Providers;

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
		if (\App::environment('production')){
		  $this->app->bind('path.public', function() {
				return base_path().'/../html';
			});
		}
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		if (\App::environment('production')){
		  $this->app->bind('path.public', function() {
				return base_path().'/../html';
			});
		}
    }
}
