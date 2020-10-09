@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-color3-light text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

@if (!isset(Auth::user()->postalcode))
  <profile-geoloc></profile-geoloc>
@endif

    @if (count($errors) > 0)
      <div class="w-full p-4 bg-color3 text-center text-2xl">
        <div class=" text-white mx-auto p-2 mb-2">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
        </div>
      </div>
    @endif

    @if(session()->has('message'))
      <div class="w-full p-4 bg-green text-white text-center text-2xl">
        <div class="mx-auto p-2 mb-2">
            {{ session()->get('message') }}
        </div>
      </div>
    @endif

    <div class=" p-4 my-5 break-words text-3xl text-primary text-center font-medium uppercase bg-white">
      @lang('Edit your profile')
    </div>

    <div class=" p-4 my-5 break-words text-lg text-gray text-center font-medium bg-white">
        <img class="rounded-full mx-auto my-2" src="{{ gravatar(Auth::user()->email) }}">
        @lang('Want to upload or change your profile photo?')
        <br>
        @lang('Do it using')
        <a class="text-primary" href="https://gravatar.com/">www.gravatar.com</a>
    </div>

    <div class="p-4 my-5 break-words text-2xl text-primary text-center font-medium bg-white">
      @lang('Location'):
      <div id="locationField" class="text-base text-gray ">
        @if (empty(Auth::user()->country) && (empty(Auth::user()->city)) )
          @lang('Please accept geolocation to set this data')
        @else
          {{Auth::user()->country}} - {{Auth::user()->city}} - {{Auth::user()->town}} - {{Auth::user()->postalcode}}
        @endif
        <a href="?geolocate=1"><button class="tf-button tf-button-primary mt-4 block mx-auto uppercase">@lang('GeoLocate Me')!</button></a>
        </div>
    </div>

    <form method="POST" action="/save-user-data">
      @csrf
    <div class=" p-4 my-5 break-words text-2xl text-primary text-center font-medium bg-white">

      <div>@lang('Description'):</div>
      <div class="text-base text-gray w-full lg:w-1/2 mx-auto">
        @lang('Write here what you can offer to others. All words will be searchable keywords.')<br>
        <span class="text-base text-primary">@lang('Max size. 255 characters')</span>
        <textarea placeholder="@lang('Write your description')..." rows="4" name="user_data"  maxlength="250"
          class="form-input w-full mt-3 mb-4 text-black">{{ old('user_data', Auth::user()->user_data) }}</textarea>
      </div>

      <div>@lang('Web Site'):</div>
      <span class="text-base text-gray">@lang('Start with https://')</span>
      <div>
        <input placeholder="@lang('https://yourweb.site')..." class="form-input w-full lg:w-1/2 mt-3 mb-4 text-black" type="text" name="website" value="{{ old('website', Auth::user()->website) }}">
      </div>

      <div>@lang('Phone'):</div>
      <div>
        <input placeholder="@lang('+1')..." class="form-input w-full lg:w-1/2 mt-3 mb-4 text-black" type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
      </div>

      <div>@lang('WhatsApp'):</div>
      <span class="text-base text-gray">@lang('Please write your phone on the International format')
        <a class="text-color3" target="_BLANK" href="https://faq.whatsapp.com/general/about-international-phone-number-format/?lang={{ Lang::locale() }}">(@lang('More info'))</a>
        <br><span class="text-base text-primary">US: +1 | Spain: +34 | Argentina: +54 | México: +521</span>
      </span>

      <div>
        <input placeholder="@lang('+1')..." class="form-input w-full lg:w-1/2 mt-3 mb-4 text-black" type="text" name="whatsapp" value="{{ old('whatsapp', Auth::user()->whatsapp) }}">
      </div>

      <div>@lang('Linkedin'):</div>
      <div>
        <input placeholder="@lang('https://www.linkedin.com/in/username')" class="form-input w-full lg:w-1/2 mt-3 mb-4 text-black" type="text" name="linkedin" value="{{old('linkedin', Auth::user()->linkedin) }}">
      </div>

      <div>@lang('Idioma'):</div>
      <div>

                <?php
                  // devuelve valor bd user
                  echo language()->flags();
                  //dd(language()->getCode('en'));
                 ?>

      </div>

      <input class="access-to tf-button tf-button-primary mt-4 block mx-auto text-xl uppercase cursor-pointer" type="submit" value="@lang('Save')">

    </div>
    </form>

@endsection
