<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // IF User is Logged in
      if (isset(Auth::user()->name)){
        return redirect()->route('profileView',Auth::user()->name);
      }

      // IF Anonymouse user
      $exchanges = \App\Exchanges::orderBy('id', 'desc')
      ->where('status', 1)
      ->with('getSellerUser')
      ->with('getBuyerUser')
      ->with('getCreatorUser')
      ->with('getRating')
      ->orderBy('id', 'desc')
      ->limit(10)
      ->get();
      return view('home')
        ->with('exchanges',$exchanges)
        ->with('userData',Auth::user());
    }

    public function lastExchanges(){
      $exchanges = \App\Exchanges::orderBy('id', 'desc')
      ->where('status', 1)
      ->with('getSellerUser')
      ->with('getBuyerUser')
      ->with('getCreatorUser')
      ->with('getRating')
      ->orderBy('id', 'desc')
      ->limit(10)
      ->get();
      return view('home')
        ->with('exchanges',$exchanges)
        ->with('userData',Auth::user());      
    }
}
