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

    <div class="grid sm:grid-cols-2">
        <div class=" p-6 break-words bg-white shadow-md">
          @auth
            <img class="rounded-full" src="{{ gravatar(Auth::user()->email) }}">
          @endauth

          @guest
            <p> Nos conocemos?</p>
          @endguest
        </div>
        <div class="p-6 break-words bg-white shadow-md">
        Col2
        </div>
    </div>


@endsection
