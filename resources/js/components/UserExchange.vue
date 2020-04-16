<template>
<div>
  <!-- FIRST LINE USERS -->
  <div class="grid grid-cols-3 bg-white shadow-md break-words">
    <div class="p-5 flex flex-col sm:flex-row items-center">

      <img class="h-12 w-12 rounded-full inline" :src="sellerGravatar">
      <div class="px-3">{{ sellerUser["name"] }}</div>

    </div>

    <div class="grid text-center items-center">
      &larr; {{ amount }} {{ $t('minutes') }}
    </div>

    <div class="p-5 flex flex-col sm:flex-row-reverse items-center ">

      <img class="h-12 w-12 rounded-full inline" :src="buyerGravatar">
      <div class="px-3">{{ buyerUser["name"] }}</div>
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
        'creatorUser',
        'actualUser',
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
