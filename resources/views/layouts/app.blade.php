<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased">
    <div id="app">
        <nav class="bg-primary shadow mb-0 sm:mb-6" style="padding:32px 0;">
            <div class="container mx-auto px-6 flex items-center justify-center">

                <!-- SIDE LEFT logo -->
                <div class="flex-1">
                    <a href="{{ url('/') }}" class="text-xl font-medium text-gray-100 no-underline">
                      <img class="rounded-full mx-auto inline h-12 w-12 mr-2" src="@auth
                        {{ gravatar(Auth::user()->email) }}
                      @else
                        {{ asset('storage/buscar.svg') }}
                      @endauth">
                      {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- SIDE RIGHT LOGIN -->
                <div class="flex">
                    <a class="mr-3" href="{{ route('search') }}">
                      <button class="tf-button tf-button-secondary">
                      <img class="w-4 h-4 inline" src="{{ asset('storage/buscar.svg') }}">
                      </button>
                    </a>
                    @guest
                      <a href="{{ route('login') }}">
                        <button class="tf-button tf-button-secondary">
                          {{ __('Login') }}
                        </button>
                      </a>
                    @else
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <button class="tf-button tf-button-secondary">{{ __('Logout') }}
                        </button>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                          {{ csrf_field() }}
                      </form>
                    @endguest
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-0 sm:px-6">
          @yield('content')
        </div>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
