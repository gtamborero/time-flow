<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index(){
      $data = User::search('informático')->get();
      dd($data);
      return view('search');
    }
}
