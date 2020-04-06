@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <x-user-heading/>

  <div class=" m-4 break-words text-2xl text-primary text-center font-medium uppercase">
    @choice('exchange',2):
  </div>

<?php
$exchange = App\Exchanges::first();
?>

<user-exchange
    concept="{{ $exchange->id }}"
    id-seller="{{ $exchange->id_seller }}"
    id-buyer="{{ $exchange->id_buyer }}"
    gravatar-url="{{ gravatar(Auth::user()->email ?? "") }}">
</user-exchange>

@endsection
