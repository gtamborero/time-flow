@extends('layouts.app')

@section('content')

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium bg-white">
      <span class="uppercase">@lang('Matching users')</span><br> Search: paco
    </div>

@foreach ($usersData as $userData)
  @include ('partials.user-heading')
  <div class="w-full pt-6"></div>
@endforeach


@endsection
