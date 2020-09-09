<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusMail;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
  }

  public function index(Request $request)
  {
    if ($request->geolocate){
      $user = Auth::user();
      $user->postalcode = NULL;
      $user->save();
    }
    return view('profile-edit');
  }
}
