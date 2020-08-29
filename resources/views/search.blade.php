@extends('layouts.app')

@section('content')

    <div class=" p-8 my-5 break-words text-2xl text-primary text-center font-medium bg-white">

          <div class="uppercase pb-4">@lang('Search by user, phone, e-mail, skills')...</div>

          <input class="shadow appearance-none
          border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight
          focus:outline-none focus:shadow-outline"
          type="text"
          placeholder="@lang('Example: Programmer, designer...')">

          <div class="flex items-center justify-between">
               <button class="mt-2 bg-primary hover:bg-primary-light
               text-white font-normal py-2 px-4 rounded
               focus:outline-none focus:shadow-outline
               block w-full" type="button">
                 @lang('Search')
               </button>
             </div>

    </div>

    <div class=" p-4 my-5 break-words text-2xl text-primary text-center font-medium bg-white">
      <span class="uppercase">@lang('Matching data')</span><br> Search: paco
    </div>

@foreach ($usersData as $userData)
  @include ('partials.user-heading')
  <div class="w-full pt-6"></div>
@endforeach


@endsection
