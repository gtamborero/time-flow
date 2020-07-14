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
      Mail::to("gtamborero@iproject.cat")->send(new StatusMail());
      return view('profile')->with('userName',$userName);
  }
}
