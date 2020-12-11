<!-- IF LOGGED IN OR NOT AND WHATCHING PROFILE -->
@isset ($userData->name)

<div class="grid md:grid-cols-2">

    <div class="p-4 md:p-8 break-words bg-white shadow-md">
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

          <div>
           {{ ucfirst($userData->country) }} - {{ ucfirst($userData->city) }} - {{ ucfirst($userData->town) }}
          </div>

          <div class="p-2">
           {{ $userData->user_data }}
          </div>

                @auth
                  <div class="social-data p-2">
                    @if ($userData->phone)
                      <a href="tel:{{$userData->phone}}"><span title="@lang('Phone')" class="icon-phone"></span></a>
                    @endif
                    @if ($userData->whatsapp)
                      <a href="https://wa.me/{{$userData->whatsapp}}?text=@lang('Hi') {{ $userData->name }}, @lang('I have seen your profile on') {{config('app.name')}}. @lang('Are you interested in') ..."><span title="WhatsApp" class="icon-whatsapp"></span></a>
                    @endif
                    @if ($userData->email)
                      <a href="mailto:{{$userData->email}}?subject=[{{config('app.name')}}] @lang('Hi') {{ $userData->name }} &body=@lang('Hi') {{ $userData->name }}, @lang('I have seen your profile on') {{config('app.name')}}. @lang('Are you interested in') ..."><span title="@lang('Mail')" class="icon-envelope-o"></span></a>
                    @endif
                    @if ($userData->website)
                      <a target="_blank" href="{{$userData->website}}"><span title="@lang('Web Site')" class="icon-earth"></span></a>
                    @endif
                    @if ($userData->linkedin)
                      <a target="_blank" href="{{$userData->linkedin}}"><span title="LinkedIn" class="icon-linkedin-square"></span></a>
                    @endif

                    @if (
                          (isAuthUser($userData->name))
                          &&
                          (!$userData->phone)
                          &&
                          (!$userData->whatsapp)
                          &&
                          (!$userData->website)
                          &&
                          (!$userData->linkedin)
                        )
                      <a href="{{ url('/profile/' . $userData->name . '/edit') }}">
                        <button class="block w-full tf-button p-2 mt-2 bg-orange text-center text-white">
                          @lang('Want to see here your WhatsApp, Phone, LinkedIn...?')<br>
                          @lang('Fill out your profile')
                        </button>
                      </a>
                    @endif

                  </div>
                @endauth

                @guest
                  <div class="social-data border-solid border border-secondary inline-block p-4 bg-gray-200">
                    <span class="icon-phone"></span>
                    <span class="icon-whatsapp"></span>
                    <span class="icon-envelope-o"></span>
                    <span class="icon-earth"></span>
                    <span class="icon-linkedin-square"></span>
                    <br>@lang('Social data is available for registered users')
                  </div>
                @endguest

        </div>
      </div>
    </div>

    <div class="p-4 md:p-8 break-words bg-gray-200 md:bg-white text-center shadow-md leading-6">

      <span class="text-xl font-medium text-primary-light block mb-4">
        @lang('Balance'): {{ humanizeMinutes($userData->getTotalBalance($userData->id)) }}
      </span>

      <span class="text-lg font-normal text-primary-light leading-relaxed block">
        @lang('Total Charges'): {{ humanizeMinutes($userData->getTotalCharge($userData->id)) }}
        <br>
        @lang('Total Payments'): {{ humanizeMinutes($userData->getTotalPayment($userData->id)) }}
        <br>
        @lang('Total exchanges'): {{ $userData->getExchangeCount($userData->id) }}
      </span>


      <br>
      <span class="capitalize">{{ $userData->name }}</span>
      @lang('have received')
      {{ $userData->getRatingCount($userData->id) }}
      @lang('ratings')

      <br>
      @lang('Average rating of users who have exchanged with') <span class="capitalize">{{ $userData->name }}</span>:
      <star-rating-direct direct-value="{{ $userData->getTotalRating($userData->id) }}"></star-rating-direct>

      @if (isset($search))
        <a class="user-link" href="/profile/{{ $userData->name }}">
          <button class="tf-button tf-button-primary items-center mx-2 w-3/4 md:w-1/4 uppercase">
            @lang('View profile')
          </button>
        </a>
      @endif
    </div>

  </div>

@endisset
