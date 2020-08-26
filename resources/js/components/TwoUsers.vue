<template>
<div>
  <!-- FIRST LINE USERS ICON -->
  <div class="grid grid-cols-3 bg-white break-words pb-3">

    <!-- LEFT USER -->
    <a class="user-link" :href="getBuyerUrl()">
      <div class="p-5 pb-1 flex flex-col sm:flex-row items-center">
        <img class="h-16 w-16 lg:h-20 lg:w-20 rounded-full inline" :src="buyerGravatar">
        <div class="px-3 capitalize">{{ buyerUser["name"] }}</div>
      </div>
    </a>

    <!-- AMOUNT -->
    <div class="grid text-center items-end">
      <div class="font-medium">
        <span class="icon-timer"></span><br>
      {{ amount }}
      <br>
      <span class="icon-fast_forward arrow-animation"></span>
      </div>
    </div>

    <!-- RIGHT USER ICON -->
    <a class="user-link" :href="getSellerUrl()">
      <div class="p-5 pb-1 flex flex-col sm:flex-row-reverse items-center ">
        <img class="h-16 w-16 lg:h-20 lg:w-20 rounded-full inline" :src="sellerGravatar">
        <div class="px-3 capitalize">{{ sellerUser["name"] }}</div>
      </div>
    </a>

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
      methods: {
        getBuyerUrl: function (){
          return "/profile/" + this.buyerUser["name"];
        },
        getSellerUrl: function (){
          return "/profile/" + this.sellerUser["name"];
        }
      }
    }
</script>
