<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Exchanges extends Model
{

    public static function statusToAccepted($id){
    $exchange = self::where('id',$id)->first();
    $exchange->status ++;
    $exchange->save();
    return 1;
    }

    public function getSellerUser(){
      return $this->hasOne('App\User','id','id_seller');
    }

    public function getBuyerUser(){
      return $this->hasOne('App\User','id','id_buyer');
    }
}
