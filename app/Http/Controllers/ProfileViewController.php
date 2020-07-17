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
      $userData = \App\User::where('name', $userName)->first();
      $userId = $userData->id;

      $exchanges = \App\Exchanges
          ::where('id_buyer', $userId)
          ->orWhere('id_seller', $userId)
          ->with('getSellerUser')
          ->with('getBuyerUser')
          ->with('getCreatorUser')
          ->with('getRating')
          ->orderBy('id', 'desc')
          ->get();

      return view('profile')
        ->with('userName',$userName)
        ->with('userId',$userId)
        ->with('userData',$userData)
        ->with('exchanges',$exchanges);
  }
}
