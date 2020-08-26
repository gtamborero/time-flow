@extends('layouts.app')

@section('content')

    <div class=" m-4 break-words text-2xl text-primary text-center font-medium uppercase">
      @lang('Matching users')
    </div>

@foreach ($usersData as $userData)
  @include ('partials.user-heading')
  <div class="w-full pt-6"></div>
@endforeach


@endsection
