<!-- IF LOGGED IN OR NOT AND WHATCHING PROFILE -->
@isset ($userData->name)

<div class="grid md:grid-cols-2">

    <div class="p-6 break-words bg-white shadow-md">
      <div class="grid">
        <div>
          <a class="user-link" href="/profile/{{ $userData->name }}">
            <img class="rounded-full mx-auto my-2" src="{{ gravatar($userData->email) }}">
          </a>
        </div>

        <div class="text-center">
          <div class="text-primary-light text-lg font-medium capitalize">
            {{ $userData->name }}
          </div>

          @auth
          <div class="text-primary-light text-md font-medium ">
            {{ $userData->email }}
          </div>
          @endauth

          @auth
          <?php if (Auth::user()->name == $userData->name){ ?>
          <div>
            <a href="{{ url('/profile/' . $userData->name . '/edit') }}">
              <button class="tf-button tf-button-primary mt-5 items-center mx-2">
                @lang('Edit my profile')
              </button>
            </a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <button class="tf-button tf-button-secondary mt-5 items-center mx-2">
                <span class="icon-log-out"></span>
                <span class="ml-2">{{ __('Logout') }}</span>
              </button>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
          </div>
          <?php } ?>
          @endauth

          <br>
          @lang('Balance'):
          {{ humanizeMinutes($userData->getTotalBalance($userData->id)) }}<br>
          @lang('Total exchanges'): {{ $userData->getExchangeCount($userData->id) }}

          <br>
          <span class="capitalize">{{ $userData->name }}</span>
          @lang('have received')
          {{ $userData->getRatingCount($userData->id) }}
          @lang('ratings')

          <br><br>
          @lang('Average rating of users who have exchanged with') <span class="capitalize">{{ $userData->name }}</span>:
          <star-rating-direct direct-value="{{ $userData->getTotalRating($userData->id) }}"></star-rating-direct>



        </div>
      </div>
    </div>

    <div class="p-6 pt-0 md:pt-6 break-words bg-white text-center shadow-md leading-6">
      <span class="text-xl font-medium text-primary-light hidden md:block mb-4">
        @lang('Description'):
        <span class="capitalize">{{ $userData->name }}</span>
      </span>
      {{ $userData->user_data }}
      <br>
      <br><span class="icon-home text-3xl"></span>
      <br> {{ ucfirst($userData->country) }} - {{ ucfirst($userData->city) }} - {{ ucfirst($userData->town) }} - {{ ucfirst($userData->postalcode) }}
      <br><br>

      @auth
        <div class="social-data p-4">
          @if ($userData->phone)
            <a href="tel:{{$userData->phone}}"><span title="@lang('Phone')" class="icon-phone"></span></a>
          @endif
          @if ($userData->whatsapp)
            <a href="https://wa.me/{{$userData->whatsapp}}"><span title="WhatsApp" class="icon-whatsapp"></span></a>
          @endif
          @if ($userData->email)
            <a href="mailto:{{$userData->email}}"><span title="@lang('Mail')" class="icon-envelope-o"></span></a>
          @endif
          @if ($userData->website)
            <a target="_blank" href="{{$userData->website}}"><span title="@lang('Web Site')" class="icon-earth"></span></a>
          @endif
          @if ($userData->linkedin)
            <a target="_blank" href="{{$userData->linkedin}}"><span title="LinkedIn" class="icon-linkedin-square"></span></a>
          @endif
        </div>
      @endauth

      @guest
        <div class="social-data border-solid border border-secondary inline-block p-4">
          <span class="icon-phone"></span>
          <span class="icon-whatsapp"></span>
          <span class="icon-envelope-o"></span>
          <span class="icon-linkedin-square"></span>
          <br>Social data is available for registered users
        </div>
      @endguest

    </div>

  </div>

@endisset
