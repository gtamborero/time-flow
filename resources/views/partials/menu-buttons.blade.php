<div class="fixed bottom-0 left-0 right-0" style="background:#000;">
  <div class="flex container mx-auto p-2 text-white">

    <a class="flex-1 text-center" href="@isset (Auth::user()->name)
        {{ route('userExchanges', Auth::user()->name) }}
      @else
        {{ url('last-exchanges') }}
      @endif">
      <button class="head-button" style="padding-top:13px;">
        <span class="icon-exchange text-white" style="font-size: 1.5rem; margin-bottom:1px;"></span>
        <span class="hidden md:block text-base">
          @lang('Exchanges')
        </span>
      </button>
    </a>

    <a class="flex-1 text-center" href="{{ route('showAllUsers') }}">
      <button class="head-button">
        <span class="icon-profile text-white text-3xl"></span>
        <span class="hidden md:block text-base capitalize">
          @lang('Users')
        </span>
      </button>
    </a>

    <a class="flex-1 text-center" href="{{ route('search') }}">
      <button class="head-button" style="padding-top:6px;">
        <span class="icon-search text-white" style="font-size: 2rem;"></span>
        <span class="hidden md:block text-base">
          @lang('Search')
        </span>
      </button>
      </a>

    @guest
      <a class="flex-1 text-center" href="{{ route('login') }}">
        <button class="head-button">
          <span class="icon-person text-white text-3xl"></span>
            <span class="hidden md:block text-base capitalize">
              {{ __('Login') }}
            </span>
        </button>
      </a>
    @else

    <a class="flex-1 text-center" href="{{ route('profileView', Auth::user()->name) }}">
      <button class="head-button">
        <span class="icon-person text-white text-3xl"></span>
        <span class="hidden md:block text-base capitalize">
          {{Auth::user()->name}}
        </span>
      </button>
    </a>

    @endguest

  </div>
</div>
