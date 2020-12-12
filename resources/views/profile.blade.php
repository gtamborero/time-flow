@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

    <div class="profile-divider text-base uppercase p-0" style="background-color:#bbb;">
      @auth
      <?php if (isAuthUser($userData->name)){ ?>
      <div class="md:flex gap-4 mx-4 sm:mx-0">

        <a class="flex-1" href="{{ url('/profile/' . $userData->name . '/edit') }}">
          <button class="tf-button tf-button-primary items-center w-full uppercase">
            @lang('Edit my profile')
          </button>
        </a>

        <a class="flex-1" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <button class="tf-button tf-button-secondary items-center w-full uppercase">
            <span class="icon-log-out"></span>
            <span class="ml-2">{{ __('Logout') }}</span>
          </button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
      </div>
      <?php } ?>
      @endauth
    </div>

    <!-- LOAD USER HEADING -->
      @include ('partials.user-profile')

        @auth
        <?php if (!isAuthUser($userData->name)){ ?>
          <div class="profile-divider text-base uppercase p-0" style="background-color:#bbb;">

          {{-- Show PAYMENT fixed down button --}}
          <?php if (isVerifiedUser() && !isAuthUser($userName)){ ?>
          <request-send-button
            :profile-user-id="{{$userId}}"
            profile-user-name="{{$userData->name}}"
            :actual-user-id="@auth {{Auth::user()->id}} @endauth"
          ></request-send-button>
          <?php } ?>
        </div>

    {{-- @include ('partials.search-block') --}}

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
        @lang(':name exchanges',['name' => $userName])
    </div>

    {{-- Feed exchange data --}}
    @include ('partials.script-injection-vue')

    {{-- Show exchanges or --}}
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

      {{-- Show Call to action to actual user or --}}
      @empty
        <?php if (isVerifiedUser() && (isAuthUser($userName))){ ?>
          <div class="p-4 my-5 break-words text-2xl text-center bg-gray-300">
            @lang('You don\'t have any exchanges yet').<br>
            @lang('Start searching users or skills').<br>
            @lang('Connect with users and start paying time')!<br><br>
            <button class="tf-button tf-button-primary text-lg uppercase">
              <a target=_BLANK href="https://www.youtube.com/watch?v=iWku72qTVfo">
                @lang('Play promotional video')
              </a>
            </button>
              <br>
            <button class="tf-button tf-button-primary text-lg uppercase">
              <a target=_BLANK href="{{URL::to('/web')}}">
                @lang('Time-Flow Web')
              </a>
            </button>
          </div>

        {{-- Show Call to action with the viewed user --}}
        <?php }else{ ?>
          <div class="p-4 my-5 break-words text-2xl text-center bg-gray-300">
            <span class="capitalize">{{ $userName }}</span> @lang('hasn\'t done exchanges yet').<br>
            @lang('Be the first one')!
          </div>
        <?php } ?>
      @endforelse

      <?php } ?>
      @endauth
      
@endsection
