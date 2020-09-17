@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
        @lang('Created exchange')
    </div>

    {{-- Feed exchange data --}}
    @include ('partials.script-injection-vue')

      @foreach ($exchanges as $exchange)
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
      @endforeach

             <a class="mt-2 bg-primary hover:bg-primary-light
                    w-full block text-white text-xl uppercase text-center font-normal py-4 px-4 rounded
                    focus:outline-none focus:shadow-outline cursor-pointer mx-auto"
                    href="/profile/{{Auth::user()->name}}" >@lang('Go Back')
              </a>

{{-- Add nice alert if exchange is just created : below 5 seconds --}}
@if ($exchange->created_at->diffInSeconds() < 5)
  <script>
  window.onload = function() {
    swal({
      title: '@lang('Payment Request Done')',
      icon: "success",
      text: ' ',
      buttons: false,
      timer: 2000
    })
  }
  </script>
@endif

@endsection
