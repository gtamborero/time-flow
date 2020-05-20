<template>
<div>
  <!-- FIRST LINE USERS -->
  <div class="grid grid-cols-3 bg-white break-words pb-3">
    <div class="p-5 pb-1 flex flex-col sm:flex-row items-center">

      <img class="h-16 w-16 rounded-full inline" :src="buyerGravatar">
      <div class="px-3">{{ buyerUser["name"] }}</div>

    </div>

    <div class="grid text-center items-center">
      <div>
      {{ amount }} {{ $t('minutes') }}
      <br>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-animation inline fill-current w-6 h-6">
          <path fill="#bbb" d="M1 5l9 5-9 5V5zm9 0l9 5-9 5V5z"></path>
        </svg>
      </div>
    </div>


    <div class="p-5 pb-1 flex flex-col sm:flex-row-reverse items-center ">

      <img class="h-16 w-16 rounded-full inline" :src="sellerGravatar">
      <div class="px-3">{{ sellerUser["name"] }}</div>
    </div>

  </div>

</div>
</template>

<script>
    export default {
      props: [
        'id',
        'concept',
        'sellerUser',
        'buyerUser',
        'amount',
        'created',
        'status',
        'sellerGravatar',
        'buyerGravatar'
      ],
      mounted() {
          //console.log('Component mounted.')
      },
      methods: {
      }
    }
</script>
