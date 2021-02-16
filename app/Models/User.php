<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use App\Models\Exchanges;
use App\Models\Constants;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Searchable;

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

    protected $totalRatings = 0;
    protected $ratingAverage = 0;

    public function getTotalCharge($userId){
      $exchangesAsSeller = Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->sum('amount');
      return $exchangesAsSeller;
    }

    public function getTotalPayment($userId){
      $exchangesAsBuyer = Exchanges
        ::where('id_buyer', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->sum('amount');
      return $exchangesAsBuyer;
    }

    public function getTotalBalance($userId){
      return ( intval($this->getTotalCharge($userId)) - intval($this->getTotalPayment($userId)) );
    }

    public function getExchangeCount($userId){
      return Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->orWhere('id_buyer', $userId)
        ->count();
    }

    // Get all ratings values 
    public function getUserRating($userId){
      $myExchanges = Exchanges
        ::where('id_seller', $userId)
        ->where('status', Constant::STATUS_ACCEPTED)
        ->get();

      $ratingData = 0;

      foreach ($myExchanges as $exchange){
        if ($exchange->getRating){
          $ratingData = $ratingData + $exchange->getRating->rating;
          $this->totalRatings++;
        }
      }

      if($this->totalRatings){
        $this->ratingAverage = $ratingData / $this->totalRatings;
      }
    }

    // Get all received ratings
    public function getRatingCount($userId){
        $this->getUserRating($userId);
        return $this->totalRatings;
    }

    // Get all ratings values and divide them buy ratings
    public function getTotalRating($userId){
        $this->getUserRating($userId);
        return $this->ratingAverage;
    }
}
