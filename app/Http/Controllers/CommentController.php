<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentController extends Controller
{
  public function __invoke(Request $request, $id){
    return Comments::updateOrCreate(
      [
        'id_exchange' => $request->id
      ],
      [
        'comment' => $request->comment,
        'rating' => $request->rating
      ]
    );
  }

}
