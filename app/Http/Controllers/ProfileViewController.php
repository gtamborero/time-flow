<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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

      // Check if user has verified mail:
      if ((Auth::user()) && ($userName == Auth::user()->name)){
        if (!isVerifiedUser()) return redirect ('email/verify');
      }

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
        ->with('userId',$userId)
        ->with('userData',$userData)
        ->with('userName',$userName)
        ->with('exchanges',$exchanges);
  }

  public function homeuser($userName)
  {
      $userData = \App\User::where('name', $userName)->first();

      // Check if user has verified mail:
      if ((Auth::user()) && ($userName == Auth::user()->name)){
        if (!isVerifiedUser()) return redirect ('email/verify');
      }

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
        ->with('userId',$userId)
        ->with('userData',$userData)
        ->with('userName',$userName)
        ->with('exchanges',$exchanges)
        ->with('homeuser',1);
  }
}
