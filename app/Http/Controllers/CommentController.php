<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comment;

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

    // Aqui hay que preparar la consulta, saber quien envia y quien recibe, tener todos los datos y luego enviar
    Mail::to("gtamborero@iproject.cat")->send(new Comment($request->id));
  }

}
