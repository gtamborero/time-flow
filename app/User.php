<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Exchanges;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Add extra data on return of the model
    protected $appends = ['gravatar'];

    // GRAVATAR GET
    public function getGravatarAttribute()
    {
        return gravatar("gtamborero@iproject.cat");
    }

    public function getTotalBalance(){
      $exchangesAsSeller = Exchanges::where('id_seller', Auth::user()->id)->sum('amount');
      $exchangesAsBuyer = Exchanges::where('id_buyer', Auth::user()->id)->sum('amount');
      return $exchangesAsSeller - $exchangesAsBuyer;
    }

    public function getExchangeCount(){
      return Exchanges
        ::where('id_seller', Auth::user()->id)
        ->orWhere('id_buyer', Auth::user()->id)->count();
    }

    // Get all ratings values and divide them buy ratings
    public function getTotalRating(){
      $myExchanges = Exchanges::where('id_seller', Auth::user()->id)->pluck('id');

      $ratingData = 0;
      $ratingsWithValue = 0;

      foreach ($myExchanges as $exchangeId){
        $getRating = \App\Comments::where('id_exchange',$exchangeId)->value('rating');
        if ($getRating){
          $ratingData = $ratingData + $getRating;
          $ratingsWithValue ++;
        }
      }

      if ($ratingsWithValue) return intval($ratingData / $ratingsWithValue);
      return 0;

    }
}
