@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD BLADE COMPONENT -->
  <x-user-heading/>

  @auth
    <div class=" m-4 break-words text-2xl text-primary text-center font-medium uppercase">
      @lang('exchanges')
    </div>

    <?php
    $exchanges = App\Exchanges::orderBy('id', 'desc')->get();
    ?>

      @foreach ($exchanges as $exchange)
        <div class="mb-6 shadow-md">
            <user-exchange
                id="{{ $exchange->id }}"
                concept="{{ $exchange->concept }}"
                :seller-user="{{$exchange->getSellerUser}}"
                :buyer-user="{{$exchange->getBuyerUser}}"
                amount="{{ $exchange->amount }}"
                :status="{{ $exchange->status }}"
                seller-gravatar="{{ gravatar($exchange->getSellerUser->email) }}"
                buyer-gravatar="{{ gravatar($exchange->getBuyerUser->email) }}">
            </user-exchange>

            <user-stars
                id="{{ $exchange->id }}"
                :actual-user-id="{{Auth::user()->id}}"
                :status="{{ $exchange->status }}">
            </user-stars>

            <user-status
              id="{{ $exchange->id }}"
              concept="{{ $exchange->concept }}"
              :seller-user="{{$exchange->getSellerUser}}"
              :buyer-user="{{$exchange->getBuyerUser}}"
              amount="{{ $exchange->amount }}"
              created="{{ $exchange->created_at->diffForHumans() }}"
              :status="{{ $exchange->status }}"
              :creator-user-id="{{$exchange->getCreatorUser->id}}"
              :actual-user-id="{{Auth::user()->id}}">
            </user-status>
        </div>
      @endforeach


  @endauth

  @guest
    <div class="grid grid-cols-3 mt-5 bg-white shadow-md break-words">
      <div class="p-5 flex flex-col sm:flex-row items-center">
        Sección Buscar usuarios
      </div>
    </div>
  @endguest

@endsection
