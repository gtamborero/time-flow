@auth
<div class="grid md:grid-cols-2">

    <div class="p-6 break-words bg-white shadow-md">
      <div class="grid">
        <div>
          <img class="rounded-full mx-auto my-2" src="{{ gravatar(Auth::user()->email) }}">
        </div>
        <div class="text-center">
          <div class="text-primary-light text-lg font-medium capitalize">
            {{ Auth::user()->name }}
          </div>
          <div class="text-primary-light text-md font-medium mb-2">
            {{ Auth::user()->email }}
          </div>
          Resumen breve de la persona Resumen breve de la persona Resumen breve de la persona Resumen breve de la persona
          Resumen breve de la persona Resumen breve de la persona Resumen breve de la persona Resumen breve de la persona
        </div>
      </div>
    </div>

    <div class="p-6 pt-0 md:pt-6 break-words bg-white text-center shadow-md leading-7">
      <span class="text-lg font-medium text-primary-light hidden md:block">
        @lang('Información de')
        <span class="capitalize">{{ Auth::user()->name }}</span>:
      </span>
      @lang('Balance global'):
      {{ Auth::user()->getTotalBalance() }} minutos<br>
      @lang('Intercambios realizados'): {{ Auth::user()->getExchangeCount() }}

      <br>
      <span class="capitalize">{{ Auth::user()->name }}</span>
      @lang('ha recibido')
      {{ Auth::user()->getRatingCount() }}
      @lang('valoraciones')

      <br>
      @lang('Valoración media de los usaurios que han intercambiado con') <span class="capitalize">{{ Auth::user()->name }}</span>:
        <star-rating-direct direct-value="{{ Auth::user()->getTotalRating() }}"></star-rating-direct>
      @lang('Reside en'): xxBARCELONA

    </div>

  </div>
@endauth

@guest
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
        <span class="text-lg font-medium text-primary-light capitalize">@lang('welcome!')</span><br>
        Puedes buscar usuarios y solicitarles o enviarles tiempo,
        pero tarde o temprano, ¡tendrás que loguearte o registrate!

        <a href="{{ url('/login') }}">
          <button class="access-to tf-button tf-button-primary mt-4 block mx-auto">
            @lang('Access to') {{ config('app.name') }}
          </button>
        </a>

      </div>

  </div>
@endguest
