<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __invoke(Request $request, $id){
    return $request->comment;
    //return Comments::changeStatus($request, $id);
  }

}
