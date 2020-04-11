<template>
<div>
  <div class="grid grid-cols-1 text-center p-1">{{ created }}:</div>
  <!-- FIRST LINE USERS -->
  <div class="grid grid-cols-3 bg-white shadow-md break-words">
    <div class="p-5 flex flex-col sm:flex-row items-center">

      <img class="h-12 w-12 rounded-full inline" :src="gravatarUrl">
      <div class="px-3">{{ idSeller }}</div>

    </div>

    <div class="p-0 md:p-5 text-center">
      <br>-- {{ amount }} {{ $t('minutes') }}
    </div>

    <div class="p-5 flex flex-col sm:flex-row-reverse items-center ">

      <img class="h-12 w-12 rounded-full inline" :src="gravatarUrl">
      <div class="px-3">{{ idBuyer }}</div>
    </div>

  </div>

  <!-- SECOND LINE COMMENTS + STARS -->
  <div class="grid grid-cols-2 bg-secondary shadow-md break-words">

    <div class="py-2 px-5 text-left">
      5 STARS<br>
      User comment
    </div>

    <div class="py-2 px-5 text-right">
      5 STARS<br>
      User comment
    </div>

  </div>

  <!-- LAST LINE for ACCEPT / REJECT / SPAM -->
  <div class="py-3 px-5 bg-primary text-white mb-5 break-words shadow-md">
      <div class="text-center flex-grow">
        Abel quiere enviarte 30min por: {{ concept }}
      </div>

      <div class="text-center">
        <a class="inline-block p-2" href="">
          <button class="tf-button tf-button-secondary">
            aceptar sin traducir
          </button>
        </a>

        <a class="inline-block p-2" href="">
          <button class="tf-button tf-button-secondary">
          recahzar sin trads
          </button>
        </a>
      </div>

  </div>
</div>
</template>

<script>
    export default {
      props: ['concept', 'idSeller', 'idBuyer', 'amount', 'created', 'status', 'gravatarUrl'],
      mounted() {
          //console.log('Component mounted.')
      }
    }
</script>
