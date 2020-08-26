<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index(){
      $usersData = User::search('barcelon')->get();
      //$userId = $userData->id;
      //dd($userData);

      return view('search')
      ->with('usersData',$usersData);
    }
}
