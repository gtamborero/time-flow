<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable = [
      'id_exchange', 'rating', 'comment',
  ];
}
