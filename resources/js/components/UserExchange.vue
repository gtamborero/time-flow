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
  <div class="py-3 px-5 bg-primary text-white mb-5 break-words shadow-md relative">
      <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
        <span class="text-sm text-gray-400">{{ created }}</span><br>
      </div>

      <div class="text-center flex-grow">
        Abel {{ $t('sends you') }} {{ amount }} {{ $t('minutes') }} {{ $t('for') }}:<br> {{ concept }}
      </div>

      <div class="text-center">
        <a class="inline-block p-2">
          <button class="tf-button tf-button-secondary uppercase" v-on:click="accept">
            {{ $t('accept') }}
          </button>
        </a>

        <a class="inline-block p-2">
          <button class="tf-button tf-button-secondary uppercase" v-on:click="reject">
          {{ $t('reject') }}
          </button>
        </a>
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
        accept: function (){
          axios
            .put('/exchange/' + this.id, {
                    name: "go",
                    description: "hoal22"
            })
            .then(response => {
              console.log(response)
            })
            .catch(error => {
              console.log(error)
            })
            .finally(() => this.loading = false)
        },
        reject: function (){
          alert(event.target.tagName);
        }
      }
    }
</script>
