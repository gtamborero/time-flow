@extends('layouts.app')

@section('content')

    <div class="p-8 mb-6 break-words text-xl text-primary text-center font-medium bg-white">
      <div class="text-4xl uppercase">@lang('Pay time to a user')</div>
      <div class="text-2xl pb-4">@lang('Search by e-mail, name, phone, skills, profession')...</div>
        <form method="get">
        {{csrf_field()}}
          <input class="shadow appearance-none
          border border-red-500 rounded w-full lg:w-1/2 py-2 px-3 text-gray-700 mb-3 leading-tight
          focus:outline-none focus:shadow-outline text-center"
          name="search"
          value="{{$search}}"
          type="text"
          autofocus
          placeholder="@lang('Example: Programmer, designer')...">

          <div class="flex items-center justify-between text-center">
             <input type="submit" class="mt-2 bg-primary hover:bg-primary-light
             w-full lg:w-1/2 text-white font-normal py-2 px-4 rounded
             focus:outline-none focus:shadow-outline cursor-pointer mx-auto uppercase" type="button" value="@lang('Search')">
             </input>
          </div>
        </form>
    </div>

@if ($usersData->isNotEmpty())
  @foreach ($usersData as $userData)
    @include ('partials.user-profile')
    <div class="w-full pt-6"></div>
  @endforeach
@elseif ($search != "")
  <div class="block">
      <div class="p-8 my-5 break-words text-2xl text-gray text-center font-medium bg-white shadow-md">
        <div class="grid">
          @lang('Nothing found by'): <span class="text-primary">{{$search}}</span>
        </div>
      </div>
  </div>
@endif

  <div class="block">
      <div class="p-8 break-words text-lg text-gray text-center font-medium bg-white shadow-md">
        <div class="text-primary block">
          @lang('Time-Flow search is powered by')
          <a target="_NEW" href="https://www.algolia.com/products/search/">
            <img class="text-center block" style="width:100%; margin:auto; padding:20px 20px 0; max-width:160px;"
            src="https://res.cloudinary.com/hilnmyskv/image/upload/q_auto/v1596652690/Algolia_com_Website_assets/images/shared/algolia_logo/logo-algolia-nebula-blue-full.svg">
          </a>
        </div>
      </div>
  </div>

@endsection
