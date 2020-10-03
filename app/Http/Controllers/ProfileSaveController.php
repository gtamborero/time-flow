<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSaveController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
  }

  // Save user data
  public function index(Request $request)
  {
      $validatedData = $request->validate([
          'phone' => 'between:9,14|nullable',
          'whatsapp' => 'phone:AUTO|nullable',
          'website' => 'url|nullable',
          'linkedin' => 'url|nullable'
      ]);

      $user = Auth::user();
      $user->user_data = $request->user_data;
      $user->phone = $request->phone;
      $user->whatsapp = $request->whatsapp;
      $user->website = $request->website;
      $user->linkedin = $request->linkedin;
      //dd($request->phone);
      $user->save();

      return redirect( '/profile/'. Auth::user()->name .'/edit')->with('message', __('Your data have been saved'));

  }

  // Save user location
  public function location(Request $request){
    $user = Auth::user();
    $user->country = $request->country;
    $user->city = $request->city;
    $user->town = $request->town;
    $user->postalcode = $request->postalcode;
    $user->save();
    return $request;
  }
}
