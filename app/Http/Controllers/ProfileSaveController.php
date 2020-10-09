<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
          'user_data' => 'string|max:250|nullable',
          'phone' => 'between:9,14|nullable',
          'whatsapp' => 'phone:AUTO|nullable',
          'website' => 'url|nullable',
          'linkedin' => 'url|starts_with:https://www.linkedin.com/|nullable'
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

  public function clearField($data){
    return Str::replaceFirst('undefined','', $data);
  }

  // Save user location
  public function location(Request $request){
    $user = Auth::user();
    $user->country = $this->clearField($request->country);
    $user->city = $this->clearField($request->city);
    $user->town = $this->clearField($request->town);
    $user->postalcode = $this->clearField($request->postalcode);
    $user->save();
    return $request;
  }
}
