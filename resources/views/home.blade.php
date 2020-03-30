@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="flex-1">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>
    </div>

    <div class="flex">
        <div class="flex-1 p-6 items-center break-words bg-white rounded shadow-md">
          <?php
          $email = "gtamborero@iproject.cat";
          $default = "https://www.somewhere.com/homestar.jpg";
          $size = 80;
          $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
          ?>
          <img class="rounded-full" src="<?php echo $grav_url; ?>" alt="" />
            <p class="text-gray-700">
                You are logged in!
            </p>
        </div>
    </div>


@endsection
