@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-color3-light text-center" role="alert">
          {{ session('status') }}
      </div>
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

    <div class="profile-divider text-3xl uppercase">
      @lang('Edit your profile')
    </div>

    <div class="profile-divider uppercase">
      <div>@lang('Language')</div>
      <div class="profileLangSelector">
      <?php
        // devuelve valor bd user
        echo language()->flags();
        //dd(language()->getCode('en'));
       ?>
      </div>
    </div>

    <div class=" p-4 my-5 break-words text-lg text-gray text-center font-medium bg-white">
        <img class="rounded-full mx-auto my-2" src="{{ gravatar(Auth::user()->email) }}">
        @lang('Want to upload or change your profile photo?')
        <br>
        @lang('Do it using')
        <a class="text-primary" href="https://gravatar.com/">www.gravatar.com</a>
    </div>

    <form method="POST" action="/save-user-data">
      @csrf

    <div class="profile-divider">

        <div>@lang('Description')</div>
        <div class="text-base text-gray w-full lg:w-1/2 mx-auto mt-2">
          @lang('Write here what you can offer to others. All words will be searchable keywords.')<br>
          <span class="text-base text-primary">@lang('Max size. 255 characters')</span>
          <textarea placeholder="@lang('Write your description')..." rows="5" name="user_data"  maxlength="250"
            class="form-input w-full mt-3 text-black">{{ old('user_data', Auth::user()->user_data) }}</textarea>
        </div>

    </div>
    <div class="profile-divider">

        <div>@lang('Location')</div>
        <span class="text-base text-gray">@lang('You can change your location if you need it')</span>

        <div class="text-base text-gray ">
            <span class="text-base text-gray">{{Auth::user()->country}} - {{Auth::user()->city}}</span>
            <input type="hidden" id="country" name="country" value="{{Auth::user()->country}}">
            <input type="hidden" id="city" name="city" value="{{Auth::user()->city}}">
            <br>
            <input id="locationField" class="form-input w-full lg:w-1/2 mt-2 mb-4 text-black"
            type="text" name="town" value="{{Auth::user()->town}}">

            <profile-geoloc></profile-geoloc>

        </div>

    </div>
    <div class="profile-divider">

        <div>@lang('Web Site')</div>
        <span class="text-base text-gray">@lang('Start with') https://</span>
        <div>
          <input placeholder="@lang('https://yourweb.site')..." class="form-input w-full lg:w-1/2 mt-2 text-black" type="text" name="website" value="{{ old('website', Auth::user()->website) }}">
        </div>

    </div>
    <div class="profile-divider">

        <div>@lang('Phone')</div>
        <div>
          <input placeholder="@lang('+1')..." class="form-input w-full lg:w-1/2 mt-3 text-black" type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
        </div>

    </div>
    <div class="profile-divider">

        <div>@lang('WhatsApp')</div>
        <span class="text-base text-gray">@lang('Please write your phone on the International format')
          <a class="text-color3" target="_BLANK" href="https://faq.whatsapp.com/general/about-international-phone-number-format/?lang={{ Lang::locale() }}">(@lang('More info'))</a>
          <span class="text-base text-primary block">US: +1 | Spain: +34 | Argentina: +54 | México: +521</span>
        </span>

        <div>
          <input placeholder="@lang('+1')..." class="form-input w-full lg:w-1/2 mt-3 text-black" type="text" name="whatsapp" value="{{ old('whatsapp', Auth::user()->whatsapp) }}">
        </div>

    </div>
    <div class="profile-divider">

        <div>@lang('Linkedin')</div>
        <div>
          <input placeholder="@lang('https://www.linkedin.com/in/username')" class="form-input w-full lg:w-1/2 mt-3 mb-4 text-black" type="text" name="linkedin" value="{{old('linkedin', Auth::user()->linkedin) }}">
        </div>

    </div>

        <input class="access-to tf-button tf-button-primary block mx-auto text-lg w-1/2 uppercase cursor-pointer" type="submit" value="@lang('Save')">

    </form>

@endsection
