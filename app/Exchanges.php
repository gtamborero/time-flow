<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    public static function statusToAccepted($id){
    $exchange = self::where('id',$id)->first();
    $exchange->status = $exchange->status + 1;
    $exchange->save();
    return 1;
    }
}
