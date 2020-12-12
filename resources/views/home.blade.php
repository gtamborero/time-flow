@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-300 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD USER HEADING -->
  @if (!isset($hideHeading))
    @include ('partials.user-simple-heading')
    {{-- @include ('partials.search-block') --}}
  @endif

  <div class="p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
    @lang('last exchanges')
  </div>

    {{-- Feed exchange data --}}
    @include ('partials.script-injection-vue')

      @foreach ($exchanges as $exchange)
        <div class="mb-6 shadow-md">
            <exchange-block
              id="{{ $exchange->id }}"
              concept="{{ $exchange->concept }}"
              :seller-user="{{$exchange->getSellerUser}}"
              :buyer-user="{{$exchange->getBuyerUser}}"
              amount="{{ humanizeMinutes($exchange->amount) }}"
              created="{{ $exchange->created_at->diffForHumans() }}"
              :creator-user-id="{{$exchange->getCreatorUser->id}}"
              seller-gravatar="{{ gravatar($exchange->getSellerUser->email) }}"
              buyer-gravatar="{{ gravatar($exchange->getBuyerUser->email) }}"
              >
            </exchange-block>
        </div>
      @endforeach

@endsection
