@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD USER HEADING -->
  @include ('partials.user-profile')

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
      <?php if (isVerifiedUser() && ($userName == Auth::user()->name)){ ?>
        @lang('your exchanges')
      <?php }else{ ?>
        @lang(':name exchanges',['name' => $userName])
      <?php } ?>
    </div>

    {{-- Feed exchange data --}}
    @include ('partials.script-injection-vue')

      @forelse ($exchanges as $exchange)
        <div class="mb-5 shadow-md">
            <exchange-block
              id="{{ $exchange->id }}"
              concept="{{ $exchange->concept }}"
              :seller-user="{{$exchange->getSellerUser}}"
              :buyer-user="{{$exchange->getBuyerUser}}"
              amount="{{ humanizeMinutes($exchange->amount) }}"
              created="{{ $exchange->created_at->diffForHumans() }}"
              :creator-user-id="{{$exchange->getCreatorUser->id}}"
              :actual-user-id="@auth {{Auth::user()->id}} @endauth @guest 0 @endguest"
              seller-gravatar="{{ gravatar($exchange->getSellerUser->email) }}"
              buyer-gravatar="{{ gravatar($exchange->getBuyerUser->email) }}"
              >
            </exchange-block>
        </div>
      @empty
        <div class="p-4 my-5 break-words text-2xl text-center bg-gray-300">
          @lang('You don\'t have any exchanges yet').<br>
          @lang('Start searching users or skills').<br>
          @lang('Connect with users and start paying time')!<br><br>
          <button class="tf-button tf-button-primary text-lg uppercase">
            <a target=_BLANK href="https://www.youtube.com/watch?v=1KY7b-C-HHA">
              @lang('Play promotional video')
            </a>
          </button>
        </div>
      @endforelse

      @include ('partials.search-block')

      <?php if (isVerifiedUser() && ($userName != Auth::user()->name)){ ?>
      <request-send-button
        :profile-user-id="{{$userId}}"
        profile-user-name="{{$userData->name}}"
        :actual-user-id="@auth {{Auth::user()->id}} @endauth"
      ></request-send-button>
      <?php } ?>

@endsection
