<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    //
    public function statusToAccepted(){
      return $this->where('id',1)->first();
    }
}
