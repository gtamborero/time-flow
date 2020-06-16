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
            <div class="container mx-auto px-6 flex items-center justify-center" >

                <!-- SIDE LEFT logo -->
                <div class="flex-1">
                    <a href="{{ url('/') }}" class="text-xl font-medium text-gray-100 no-underline">
                      LOGO<!--<img class="rounded-full mx-auto inline h-12 w-12 mr-2" src="">-->
                      {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- SIDE RIGHT LOGIN -->
                <div class="flex">
                    <a href="{{ route('search') }}">
                      <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M17.545 15.467l-3.779-3.779a6.15 6.15 0 00.898-3.21c0-3.417-2.961-6.377-6.378-6.377A6.185 6.185 0 002.1 8.287c0 3.416 2.961 6.377 6.377 6.377a6.15 6.15 0 003.115-.844l3.799 3.801a.953.953 0 001.346 0l.943-.943c.371-.371.236-.84-.135-1.211zM4.004 8.287a4.282 4.282 0 014.282-4.283c2.366 0 4.474 2.107 4.474 4.474a4.284 4.284 0 01-4.283 4.283c-2.366-.001-4.473-2.109-4.473-4.474z"/></svg>
                        <span class="hidden md:block ml-2">Search</span>
                      </button>
                      </a>
                    @guest
                      <a href="{{ route('login') }}">
                        <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                          <svg class="fill-current w-6 h-6 md:w-5 md:h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20">
                              <path d="M7.725 2.146c-1.016.756-1.289 1.953-1.239 2.59.064.779.222 1.793.222 1.793s-.313.17-.313.854c.109 1.717.683.976.801 1.729.284 1.814.933 1.491.933 2.481 0 1.649-.68 2.42-2.803 3.334C3.196 15.845 1 17 1 19v1h18v-1c0-2-2.197-3.155-4.328-4.072-2.123-.914-2.801-1.684-2.801-3.334 0-.99.647-.667.932-2.481.119-.753.692-.012.803-1.729 0-.684-.314-.854-.314-.854s.158-1.014.221-1.793c.065-.817-.398-2.561-2.3-3.096-.333-.34-.558-.881.466-1.424-2.24-.105-2.761 1.067-3.954 1.929z"/>
                            </svg>
                            <span class="hidden md:block ml-2">{{ __('Login') }}</span>
                        </button>
                      </a>
                    @else

                    <a href="{{ route('profileView', Auth::user()->name) }}">
                      <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                        <svg class="fill-current w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path  d="M19 3H1a1 1 0 00-1 1v12a1 1 0 001 1h18a1 1 0 001-1V4a1 1 0 00-1-1zm-6 4h4v1h-4V7zm-2 7.803a2.31 2.31 0 00-.529-.303c-1.18-.508-2.961-1.26-2.961-2.176 0-.551.359-.371.518-1.379.066-.418.385-.007.445-.961 0-.38-.174-.475-.174-.475s.088-.562.123-.996c.036-.453-.221-1.8-1.277-2.097-.186-.188-.311-.111.258-.412-1.244-.059-1.534.592-2.196 1.071-.564.42-.717 1.085-.689 1.439.037.433.125.996.125.996s-.175.094-.175.474c.061.954.38.543.445.961.158 1.008.519.828.519 1.379 0 .916-1.781 1.668-2.961 2.176a2.503 2.503 0 00-.471.26V5h9v9.803zM18 11h-5v-1h5v1z"/>
                        </svg>
                        <span class="hidden md:block ml-2">@lang('My Profile')</span>
                      </button>
                    </a>

                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <button class="tf-button tf-button-secondary inline-flex items-center mx-2">
                          <svg class="fill-current w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M0 14v1.498c0 .277.225.502.502.502h.997A.502.502 0 002 15.498V14c0-.959.801-2.273 2-2.779V9.116C1.684 9.652 0 11.97 0 14zm12.065-9.299l-2.53 1.898c-.347.26-.769.401-1.203.401H6.005C5.45 7 5 7.45 5 8.005v3.991C5 12.55 5.45 13 6.005 13h2.327c.434 0 .856.141 1.203.401l2.531 1.898a3.502 3.502 0 002.102.701H16V4h-1.832c-.758 0-1.496.246-2.103.701zM17 6v2h3V6h-3zm0 8h3v-2h-3v2z"/>
                          </svg>
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
