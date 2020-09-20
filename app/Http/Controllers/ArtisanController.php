<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
  public function __invoke(){
    //Storage::deleteDirectory('public');
    //Storage::makeDirectory('public');
    //Artisan::call('migrate:fresh --seed');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
  }

}
