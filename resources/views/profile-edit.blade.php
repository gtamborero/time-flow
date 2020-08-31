@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
      @lang('Profile edition')
    </div>

    <form method="POST" action="/save-user-data">
      @csrf
    <div class=" p-4 my-5 break-words text-2xl text-primary text-center font-medium uppercase bg-white">

      <div>Description:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="user_data" value="{{Auth::user()->user_data}}">
      </div>

      <div>WebSite:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="phone" value="{{Auth::user()->phone}}">
      </div>

      <div>Phone:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="phone" value="{{Auth::user()->phone}}">
      </div>

      <div>Whatsapp:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="whatsapp" value="{{Auth::user()->whatsapp}}">
      </div>

      <div>Linkedin:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="linkedin" value="{{Auth::user()->linkedin}}">
      </div>

      <input class="access-to tf-button tf-button-primary mt-4 block mx-auto" type="submit" value="send">

    </div>
    </form>

@endsection
