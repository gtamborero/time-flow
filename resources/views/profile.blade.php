@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD USER HEADING -->
  @include ('partials.user-heading')

    <div class=" m-4 break-words text-3xl text-primary text-center font-medium uppercase">
      @lang('your exchanges')
    </div>

    <?php
      $userId = App\User::where('name',$userName)->value('id');
      // Eloquent Get Exchanges of actual user
      // (search user as buyer or seller)
      $exchanges = App\Exchanges
          ::where('id_buyer', $userId)
          ->orWhere('id_seller', $userId)
          ->orderBy('id', 'desc')->get();
    ?>

    {{-- Feed exchange data --}}
    @include ('partials.script-injection-vue')

      @foreach ($exchanges as $exchange)
        <div class="mb-6 shadow-md">
            <exchange-block
              id="{{ $exchange->id }}"
              concept="{{ $exchange->concept }}"
              :seller-user="{{$exchange->getSellerUser}}"
              :buyer-user="{{$exchange->getBuyerUser}}"
              amount="{{ $exchange->amount }}"
              created="{{ $exchange->created_at->diffForHumans() }}"
              :creator-user-id="{{$exchange->getCreatorUser->id}}"
              :actual-user-id="@auth {{Auth::user()->id}} @endauth @guest 0 @endguest"
              seller-gravatar="{{ gravatar($exchange->getSellerUser->email) }}"
              buyer-gravatar="{{ gravatar($exchange->getBuyerUser->email) }}"
              >
            </exchange-block>
        </div>
      @endforeach

      <request-send-button
        :profile-user-id="{{$userId}}"
        profile-user-name="{{$userName}}"
        :actual-user-id="@auth {{Auth::user()->id}} @endauth"
      ></request-send-button>

@endsection
