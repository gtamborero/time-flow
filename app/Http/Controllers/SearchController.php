<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request){

      if (!$request->input('search')){
        return view('search')
          ->with('usersData',collect())
          ->with('search','');
      }

      $usersData = User::search($request->input('search'))->get();
      return view('search')
        ->with('usersData',$usersData)
        ->with('search',$request->input('search'));
    }
}
