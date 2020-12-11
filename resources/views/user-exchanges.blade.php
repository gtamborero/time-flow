@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <div class="md:flex gap-4 m-4 sm:mx-0">

    <a class="flex-1" href="{{ url('/search') }}">
      <button class="tf-button tf-button-3 items-center w-full uppercase">
        @lang('Make a Payment')
      </button>
    </a>

    <a class="flex-1" href="{{ url('last-exchanges') }}">
      <button class="tf-button tf-button-secondary items-center w-full uppercase">
        <span class="ml-2">{{ __('Last exchanges') }}</span>
      </button>
    </a>

  </div>

    <!-- LOAD USER HEADING -->
      @include ('partials.user-simple-heading')



        @auth
        <?php if (Auth::user()->name != $userData->name){ ?>
          <div class="profile-divider text-base uppercase p-0" style="background-color:#bbb;">

          {{-- Show PAYMENT button --}}
          <?php if (isVerifiedUser() && ($userName != Auth::user()->name)){ ?>
          <request-send-button
            :profile-user-id="{{$userId}}"
            profile-user-name="{{$userData->name}}"
            :actual-user-id="@auth {{Auth::user()->id}} @endauth"
          ></request-send-button>
          <?php } ?>
        </div>
      <?php } ?>
      @endauth

  {{-- @include ('partials.search-block') --}}

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
      <?php if (isVerifiedUser() && ($userName == Auth::user()->name)){ ?>
        @lang('your exchanges')
      <?php }else{ ?>
        @lang(':name exchanges',['name' => $userName])
      <?php } ?>
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
        <?php if (isVerifiedUser() && ($userName == Auth::user()->name)){ ?>
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

@endsection
