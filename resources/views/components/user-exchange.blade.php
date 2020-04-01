<div class=" m-4 break-words text-2xl text-primary text-center font-medium">
  {{ __('EXCHANGES')}}:
</div>

<div class="grid md:grid-cols-3 mt-4 bg-white shadow-md break-words">
    <div class="py-3 px-5 col-span-3 bg-secondary">
    Hace 10 minutos
  </div>
</div>

<div class="grid md:grid-cols-3 bg-white shadow-md break-words">

  <div class="py-3 px-5 col-span-3 bg-primary text-white">
    <div class="flex items-center">
      <div>Xavier te envia</div>
      <a href="{{ route('login') }}">
        <button class="tf-button tf-button-secondary">
          {{ __('RECHAZAR') }}
        </button>
      </a>

      <div class="mx-auto"></div>

      <a href="{{ route('login') }}">
        <button class="tf-button tf-button-secondary">
          {{ __('ACEPTAR') }}
        </button>
      </a>

    </div>
  </div>

  <!-- FIRST LINE USERS -->
  <div class="p-5 flex flex-col md:flex-row items-center">
    <img class="h-12 w-12 rounded-full inline" src="{{ gravatar(Auth::user()->email ?? "") }}">
    <div class="px-3">Guillermo</div>
  </div>

  <div class="p-0 md:p-5 text-center"> 30min -> </div>

  <div class="p-5 flex flex-col md:flex-row-reverse items-center ">
    <img class="h-12 w-12 rounded-full inline" src="{{ gravatar(Auth::user()->email ?? "") }}">
    <div class="px-3">Xavier</div>
  </div>

</div>

<!-- SECOND LINE COMMENTS + STARS -->
<div class="grid md:grid-cols-2 bg-secondary shadow-md break-words">

  <div class="py-2 px-5 text-center">
    Guillermo<br>
    5 STARS
  </div>

  <div class="py-2 px-5 text-center">
    Xavier<br>
    5 STARS
  </div>

</div>
