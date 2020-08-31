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

  public function index(Request $request)
  {

      $validatedData = $request->validate([
          'phone' => 'between:9,14',
          'whatsapp' => 'between:9,14',
          'linkedin' => 'url'
      ]);

      $user = \App\User::find(Auth::user()->id);

      $user->user_data = $request->user_data;
      $user->phone = $request->phone;
      $user->whatsapp = $request->whatsapp;
      $user->linkedin = $request->linkedin;
      //dd($request->phone);
      $user->save();

      return redirect( '/profile/'. Auth::user()->name .'/edit')->with('message','El formulario ha sido enviado correctamente');

  }
}
