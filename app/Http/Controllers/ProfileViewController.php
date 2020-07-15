<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusMail;

class ProfileViewController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
  }

  public function index($userName)
  {
      return view('profile')->with('userName',$userName);
  }
}
