<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    public static function statusToAccepted($id){
    $exchange = Exchanges::where('id',$id)->first();
    $exchange->status = 8;
    $exchange->save();
      return 1;
    }
}
