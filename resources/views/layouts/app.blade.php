<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @laravelPWA

<!-- APPLE ICONS: npm install --global pwa-asset-generator + npx pwa-asset-generator logo-timeflow.png -b 1a2345 -->
<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180.jpg">
<link rel="apple-touch-icon" sizes="167x167" href="apple-icon-167.jpg">
<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152.jpg">
<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120.jpg">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="apple-touch-startup-image" href="apple-splash-2048-2732.jpg" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2732-2048.jpg" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1668-2388.jpg" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2388-1668.jpg" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1536-2048.jpg" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2048-1536.jpg" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1668-2224.jpg" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2224-1668.jpg" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1620-2160.jpg" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2160-1620.jpg" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1284-2778.jpg" media="(device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2778-1284.jpg" media="(device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1170-2532.jpg" media="(device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2532-1170.jpg" media="(device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1125-2436.jpg" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2436-1125.jpg" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1242-2688.jpg" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2688-1242.jpg" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-828-1792.jpg" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-1792-828.jpg" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-1242-2208.jpg" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-2208-1242.jpg" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-750-1334.jpg" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-1334-750.jpg" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
<link rel="apple-touch-startup-image" href="apple-splash-640-1136.jpg" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="apple-splash-1136-640.jpg" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)">
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
