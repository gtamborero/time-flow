@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD BLADE COMPONENT -->
  <x-user-heading/>

  <div class=" m-4 break-words text-2xl text-primary text-center font-medium uppercase">
    @lang('exchanges')
  </div>

<?php
$exchange = App\Exchanges::first();
?>

<user-exchange
    concept="{{ $exchange->concept }}"
    id-seller="{{ $exchange->id_seller }}"
    id-buyer="{{ $exchange->id_buyer }}"
    amount="{{ $exchange->amount }}"
    created="{{ $exchange->created_at->diffForHumans() }}"
    gravatar-url="{{ gravatar(Auth::user()->email ?? "") }}">
</user-exchange>

@endsection
