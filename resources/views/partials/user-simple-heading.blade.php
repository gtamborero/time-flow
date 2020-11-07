<!-- IF LOGGED IN OR NOT AND WHATCHING PROFILE -->
@isset ($userData->name)

<div class="grid md:grid-cols-1">

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
          <div class="text-primary-light text-md font-medium ">
            {{ $userData->email }}
          </div>

        </div>
      </div>
    </div>

  </div>

@endisset

@empty ($userData->name)
  <div class="grid md:grid-cols-2">

      <div class="p-6 break-words bg-white shadow-md">
        <div class="grid">

          <a href="{{ url('/login') }}">
            <div>
              <img class="rounded-full mx-auto my-2" src="{{ gravatar("") }}">
            </div>
            <div class="text-center">
              <div class="text-primary-light text-lg font-medium capitalize">
                @lang('anonymous user')
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="p-6 pt-0 md:pt-6 break-words bg-white text-center shadow-md leading-7">
        <span class="text-lg font-medium text-primary-light capitalize">@lang('Welcome')!</span><br>
        @lang('Time-Flow is a universal time exchanging system. Register / Login to start exchanging')!

        <a href="{{ url('/login') }}">
          <button class="access-to tf-button tf-button-primary mt-4 block mx-auto">
            @lang('Access to') {{ config('app.name') }}
          </button>
        </a>
      </div>

  </div>
@endempty
