@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

    <div class="profile-divider text-base uppercase p-0" style="background-color:#bbb;">
      @auth
      <?php if (Auth::user()->name == $userData->name){ ?>
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
        <?php if (Auth::user()->name != $userData->name){ ?>
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
      <?php } ?>
      @endauth

  {{-- @include ('partials.search-block') --}}

@endsection
