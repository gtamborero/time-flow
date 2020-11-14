<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
  public function __invoke(){
    //Storage::deleteDirectory('public');
    //Storage::makeDirectory('public');
    //Artisan::call('migrate:fresh --seed --force');
	Artisan::call('cache:clear');
	Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');
  }

  public function mailWork(){
  	//Artisan::call('queue:restart');
	//Artisan::call('queue:work --stop-when-empty --tries=2');
  Artisan::call('queue:work --max-time=275'); // only for laravel 8
  }

}
