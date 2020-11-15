<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Jobs\SendMailProcess;

class CommentController extends Controller
{
  public function __invoke(Request $request, $id){
    Comments::updateOrCreate(
      [
        'id_exchange' => $request->id
      ],
      [
        'comment' => $request->comment,
        'rating' => $request->rating
      ]
    );

    // envio correo del id intercambio
    SendMailProcess::dispatch($request->id);
  }

}
