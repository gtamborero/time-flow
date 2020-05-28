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

    public function getTotalBalance($userId){

      $exchangesAsSeller = Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->sum('amount');

      $exchangesAsBuyer = Exchanges
        ::where('id_buyer', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->sum('amount');
      return $exchangesAsSeller - $exchangesAsBuyer;
    }

    public function getExchangeCount($userId){
      return Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->orWhere('id_buyer', $userId)
        ->count();
    }

    // Get all received ratings
    public function getRatingCount($userId){
      $myExchanges = Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->get();

        $ratingsWithValue = 0;

        foreach ($myExchanges as $exchange){
          if ($exchange->getRating){
            $ratingsWithValue ++;
          }
        }

        if ($ratingsWithValue) return $ratingsWithValue;
        return 0;
    }

    // Get all ratings values and divide them buy ratings
    public function getTotalRating($userId){
      $myExchanges = Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->get();

      $ratingData = 0;
      $ratingsWithValue = 0;

      foreach ($myExchanges as $exchange){
        if ($exchange->getRating){
          $ratingData = $ratingData + $exchange->getRating->rating;
          $ratingsWithValue ++;
        }
      }

      if ($ratingsWithValue) return intval($ratingData / $ratingsWithValue);
      return 0;
    }
}
