@auth
<div class="grid md:grid-cols-2">

    <div class="p-6 break-words bg-white shadow-md">
      <div class="grid">
        <div>
          <img class="rounded-full mx-auto my-2" src="{{ gravatar(Auth::user()->email) }}">
        </div>
        <div class="text-center">
          <div class="text-primary-light text-lg font-medium">
            {{ Auth::user()->email }}
          </div>
          Resumen breve de guillermo
        </div>
      </div>
    </div>

    <div class="p-6 pt-0 md:pt-6 break-words bg-white text-center shadow-md leading-7">
      <span class="text-lg font-medium text-primary-light">Información de Guillermo:</span><br>
      Balance global: 50horas<br>
      Intercambios realizados: 7<br>
      Karma: 5 Stars<br>
      Reside en:BARCELONA
    </div>

  </div>
@endauth

@guest
  <div class="grid md:grid-cols-2">

      <div class="p-6 break-words bg-white shadow-md">
        <div class="grid">
          <div>
            <img class="rounded-full mx-auto my-2" src="{{ gravatar("") }}">
          </div>
          <div class="text-center">
            <div class="text-primary-light text-lg font-medium capitalize">
              @lang('anonymous user')
            </div>
          </div>
        </div>
      </div>

      <div class="p-6 pt-0 md:pt-6 break-words bg-white text-center shadow-md leading-7">
        <span class="text-lg font-medium text-primary-light capitalize">@lang('welcome!')</span><br>
        Puedes buscar usuarios y solicitarles o enviarles tiempo,
        pero tarde o temprano, ¡tendrás que loguearte o registrate!

        <button class="access-to tf-button tf-button-primary mt-4">
          <a href="{{ url('/login') }}">@lang('Access to') {{ config('app.name') }}</a>
        </button>

      </div>

  </div>
@endguest
