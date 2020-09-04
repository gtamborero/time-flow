@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD USER HEADING -->
  @include ('partials.user-heading')


  <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
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

      <div class=" p-8 my-5 break-words text-xl text-primary text-center font-medium bg-white">

        <div class="uppercase pb-4">@lang('Search user, phone, skills, profession')...</div>

          <form method="get" action="/search">
          {{csrf_field()}}
            <input class="shadow appearance-none
            border border-red-500 rounded w-full lg:w-1/2 py-2 px-3 text-gray-700 mb-3 leading-tight
            focus:outline-none focus:shadow-outline text-center"
            name="search"
            value=""
            type="text"
            placeholder="@lang('Example: Programmer, designer...')">

            <div class="flex items-center justify-between text-center">
               <input type="submit" class="mt-2 bg-primary hover:bg-primary-light
               w-full lg:w-1/2 text-white font-normal py-2 px-4 rounded
               focus:outline-none focus:shadow-outline cursor-pointer mx-auto" type="button" value="@lang('Search')">
               </input>
            </div>
          </form>

      </div>

@endsection
