<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exchanges extends Model
{
  protected $visible = ['id','other_column'];

    public static function statusToAccepted($id){
    $exchange = self::where('id',$id)->first();
      if (
          Auth::user()->id == $exchange->id_seller
          ||
          Auth::user()->id == $exchange->id_buyer
      ){
          $exchange->status ++;
          $exchange->save();
          return 1;
      }
      return "AUTH ERROR";
    }

    public function getSellerUser(){
      return $this->hasOne('App\User','id','id_seller');
    }

    public function getBuyerUser(){
      return $this->hasOne('App\User','id','id_buyer');
    }

    public function getCreatorUser(){
      return $this->hasOne('App\User','id','id_creator');
    }

    public function getRating(){
      return $this->hasOne('App\Comments','id_exchange','id')->select(['rating', 'comment']);
    }
}
