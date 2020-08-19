<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index(){
      $data = User::search('pitufo')->get();
      dd($data);
      return view('search');
    }
}
