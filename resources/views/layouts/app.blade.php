<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class=" h-screen antialiased" style="background-color:#bbb;">
    <div id="app">
        <nav class="bg-primary shadow mb-0 sm:mb-6" style="padding:32px 0;">
            <div class="container mx-auto px-6 flex items-center justify-center" >

                <!-- SIDE LEFT logo -->
                <div class="flex-1">
                    <a href="{{ url('/') }}" class="text-xl font-medium text-gray-100 no-underline">
                      <img style="width:50%; max-width:250px;" src="/img/logo-timeflow.png">

                    </a>
                </div>

                <!-- SIDE RIGHT LOGIN -->
                <div class="flex">
                    <a href="{{ route('search') }}">
                      <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                        <span class="icon-search"></span>
                        <span class="hidden md:block ml-2">Search</span>
                      </button>
                      </a>
                    @guest
                      <a href="{{ route('login') }}">
                        <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                          <span class="icon-person"></span>
                            <span class="hidden md:block ml-2">{{ __('Login') }}</span>
                        </button>
                      </a>
                    @else

                    <a href="{{ route('profileView', Auth::user()->name) }}">
                      <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                        <span class="icon-person"></span>
                        <span class="hidden md:block ml-2">@lang('My Profile')</span>
                      </button>
                    </a>

                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                          <span class="icon-log-out"></span>
                          <span class="hidden md:block ml-2">{{ __('Logout') }}</span>
                        </button>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                          {{ csrf_field() }}
                      </form>
                    @endguest
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-0 sm:px-6" style="padding-bottom:90px;">
          @yield('content')
        </div>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
