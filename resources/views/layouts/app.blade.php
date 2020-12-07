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
        <nav class="bg-primary shadow mb-0 sm:mb-6 w-full z-50" style="padding:14px 0;">
            <div class="container mx-auto px-5 flex items-center justify-center" >
                <!-- SIDE LEFT logo -->
                <div class="flex-1">
                    <a href="{{ url('/') }}" class="text-xl font-medium text-gray-100 no-underline">
                      <img style="width:85%; margin:auto; max-width:275px;" src="/img/logo-timeflow.png">
                    </a>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-0 sm:px-6 pb-6">
          @yield('content')
        </div>

        <div class="fixed bottom-0 left-0 right-0" style="background:#000;">
          <div class="flex container mx-auto p-2 text-white">

            <a class="flex-1 text-center" href="{{ url('/last-exchanges') }}">
              <button class="head-button items-center mx-1 lg:mx-2" style="padding-top:13px;">
                <span class="icon-exchange text-white" style="font-size: 1.5rem; margin-bottom:1px;"></span>
                <span class="hidden md:block ml-2 mr-1">
                  @lang('last exchanges')
                </span>
              </button>
            </a>

            <a class="flex-1 text-center" href="{{ route('showAllUsers') }}">
              <button class="head-button mx-1 lg:mx-2">
                <span class="icon-profile text-white text-3xl"></span>
                <span class="hidden md:block ml-2 capitalize">
                  @lang('View last users')
                </span>
              </button>
            </a>

            <a class="flex-1 text-center" href="{{ route('search') }}">
              <button class="head-button mx-1 lg:mx-2" style="padding-top:6px;">
                <span class="icon-search text-white" style="font-size: 2rem;"></span>
                <span class="hidden md:block ml-2 mr-1">
                  @lang('Search')
                </span>
              </button>
              </a>

            @guest
              <a class="flex-1 text-center" href="{{ route('login') }}">
                <button class="head-button mx-1 lg:mx-2">
                  <span class="icon-person text-white text-3xl"></span>
                    <span class="hidden md:block ml-2">
                      {{ __('Login') }}
                    </span>
                </button>
              </a>
            @else

            <a class="flex-1 text-center" href="{{ route('profileView', Auth::user()->name) }}">
              <button class="head-button mx-1 lg:mx-2">
                <span class="icon-person text-white text-3xl"></span>
                <span class="hidden md:block ml-2 capitalize">
                  {{Auth::user()->name}}
                </span>
              </button>
            </a>

            @endguest

          </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
