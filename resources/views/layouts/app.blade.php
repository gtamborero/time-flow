<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @laravelPWA
</head>

<body class=" h-screen antialiased" style="background-color:#bbb;">
    <div id="app">
        <nav class="bg-primary shadow mb-0 sm:mb-6 fixed w-full z-50" style="padding:20px 0;">
            <div class="container mx-auto px-6 flex items-center justify-center" >

                <!-- SIDE LEFT logo -->
                <div class="flex-1">
                    <a href="{{ url('/') }}" class="text-xl font-medium text-gray-100 no-underline">
                      <img style="width:85%; margin-left:4px; max-width:250px;" src="/img/logo-timeflow.png">

                    </a>
                </div>

                <!-- SIDE RIGHT LOGIN -->
                <div class="flex">
                    <a href="{{ route('search') }}">
                      <button class="head-button inline-flex items-center mx-1 lg:mx-2">
                        <span class="icon-search text-white" style="font-size: 2rem; margin-bottom:-1px; margin-right:2px;"></span>
                        <span class="hidden md:block ml-2 mr-1">@lang('Search')</span>
                      </button>
                      </a>
                    @guest
                      <a href="{{ route('login') }}">
                        <button class="head-button inline-flex items-center mx-1 lg:mx-2">
                          <span class="icon-person text-white text-3xl"></span>
                            <span class="hidden md:block ml-2">{{ __('Login') }}</span>
                        </button>
                      </a>
                    @else

                    <a href="{{ route('profileView', Auth::user()->name) }}">
                      <button class="head-button inline-flex items-center mx-1 lg:mx-2">
                        <span class="icon-person text-white text-3xl"></span>
                        <span class="hidden md:block ml-2 capitalize">{{Auth::user()->name}}</span>
                      </button>
                    </a>

                    @endguest
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-0 sm:px-6 pb-6" style="padding-top:87px;">
          @yield('content')
        </div>

        <div class="w-full" style="background:#000;">
          <div class="flex container mx-auto p-2 text-white">

            <a class="flex-1" href="{{ route('showAllUsers') }}">
              <button class="tf-button items-center uppercase">
                @lang('View last users')
              </button>
            </a>

            <a class="flex-1" href="{{ url('/web') }}">
              <button class="tf-button uppercase float-right">
                @lang('Time-flow WebSite')
              </button>
            </a>

          </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

    <script>
    function paymentAlert(){
      swal({
        title: '@lang('You must search for a user first!')',
        icon: "info",
        text: '@lang('Inside every user profile you will be able to make Payments')',
        buttons: {
          confirm: {
            text: '@lang('OK, Thanks!')',
            className: 'text-center',
            visible: true,
            closeModal: true
          }
        },
        timer: 6000
      })
    }
    </script>

</body>
</html>
