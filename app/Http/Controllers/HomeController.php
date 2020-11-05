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
    public function index(Request $request)
    {

      // CHange lang if ?locale=lang
      if ($request->input('locale') == 'es'){
        Auth::user()->locale = 'es';
        Auth::user()->save();
      }
      if ($request->input('locale') == 'en'){
        Auth::user()->locale = 'en';
        Auth::user()->save();
      }

      // IF User is Logged in
      if (isset(Auth::user()->name)){
        return redirect()->route('profileEdit',Auth::user()->name);
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
