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


      <div class="w-full p-2">
        @if (count($errors) > 0)
            <div class="lg:w-1/2 bg-orange text-white mx-auto p-2 mb-2">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
            </div>
        @endif

        @if(session()->has('message'))
            <div class="lg:w-1/2 bg-gray-400 mx-auto p-2 mb-2">
                {{ session()->get('message') }}
            </div>
        @endif
      </div>

      <div>Description:</div>
      <div>
        <textarea rows="4" name="user_data" class="form-input w-full mt-3 mb-4 text-black">
        {{ old('user_data', Auth::user()->user_data) }}
        </textarea>
      </div>

      <div>WebSite:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="phone" value="{{ old('website', Auth::user()->phone) }}">
      </div>

      <div>Phone:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
      </div>

      <div>Whatsapp:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="whatsapp" value="{{ old('whatsapp', Auth::user()->whatsapp) }}">
      </div>

      <div>Linkedin:</div>
      <div>
        <input class="form-input w-full mt-3 mb-4 text-black" type="text" name="linkedin" value="{{old('linkedin', Auth::user()->linkedin) }}">
      </div>

      <input class="access-to tf-button tf-button-primary mt-4 block mx-auto" type="submit" value="send">

    </div>
    </form>

@endsection
