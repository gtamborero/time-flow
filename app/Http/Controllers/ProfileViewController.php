<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileViewController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index($userName)
  {
      return view('home')->with('userName',$userName);
  }
}
