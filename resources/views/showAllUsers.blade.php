@extends('layouts.app')

@section('content')

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
