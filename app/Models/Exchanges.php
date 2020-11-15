<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exchanges extends Model
{
  protected $visible = ['id','other_column'];

    public static function changeStatus($request, $id){

      // get exchange by id
      $exchange = self::where('id',$id)->first();

      // Security user check
      if (
          Auth::user()->id == $exchange->id_seller
          ||
          Auth::user()->id == $exchange->id_buyer
      ){
          // Change status to newStatus
          if (is_numeric($request->status)) $exchange->status = $request->status;
          $exchange->save();
          return 1;
      }
      return "AUTH ERROR";
    }

    public function getSellerUser(){
      return $this->hasOne('App\Models\User','id','id_seller');
    }

    public function getBuyerUser(){
      return $this->hasOne('App\Models\User','id','id_buyer');
    }

    public function getCreatorUser(){
      return $this->hasOne('App\Models\User','id','id_creator');
    }

    public function getRating(){
      return $this->hasOne('App\Models\Comments','id_exchange','id');
    }
}
