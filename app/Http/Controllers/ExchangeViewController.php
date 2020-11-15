<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeViewController extends Controller
{

    public function index($exchangeId)
    {
        $userData = \App\Models\User::where('name', Auth::user()->name)->first();

        // Check if user has verified mail:
        if (!isVerifiedUser()) return redirect ('email/verify');

        $userId = $userData->id;

        $exchanges = \App\Models\Exchanges
            ::where('id', $exchangeId)->get();

        return view('single-exchange')
          ->with('userId',$userId)
          ->with('userData',$userData)
          ->with('userName',Auth::user()->name)
          ->with('exchanges',$exchanges);
    }
}
