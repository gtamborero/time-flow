<!-- FIRST LINE USERS -->
<div class="grid grid-cols-3 bg-white shadow-md break-words">
  <div class="p-5 flex flex-col sm:flex-row items-center">
    <img class="h-12 w-12 rounded-full inline" src="{{ gravatar(Auth::user()->email ?? "") }}">
    <div class="px-3">Guillermo</div>
  </div>

  <div class="p-0 md:p-5 text-center"> 30min -> </div>

  <div class="p-5 flex flex-col sm:flex-row-reverse items-center ">
    <img class="h-12 w-12 rounded-full inline" src="{{ gravatar(Auth::user()->email ?? "") }}">
    <div class="px-3">Xavier</div>
  </div>

</div>

<!-- SECOND LINE COMMENTS + STARS --><!--
<div class="grid md:grid-cols-2 bg-secondary shadow-md break-words">

  <div class="py-2 px-5 text-center">
    Guillermo<br>
    5 STARS
  </div>

  <div class="py-2 px-5 text-center">
    Xavier<br>
    5 STARS
  </div>

</div>-->

<!-- LAST LINE for ACCEPT / REJECT / SPAM -->
<div class="py-3 px-5 bg-primary text-white mb-5 break-words shadow-md">
    <div class="text-center flex-grow">
      Abel quiere enviarte 30min por: Clases de Guitarra
    </div>

    <div class="text-center">
      {{-- <div>App\Exchanges::all()</div> --}}
      <a class="inline-block p-2" href="{{ route('login') }}">
        <button class="tf-button tf-button-secondary">
          {{ __('ACEPTAR') }}
        </button>
      </a>

      <a class="inline-block p-2" href="{{ route('login') }}">
        <button class="tf-button tf-button-secondary">
          {{ __('RECHAZAR') }}
        </button>
      </a>
    </div>

</div>
