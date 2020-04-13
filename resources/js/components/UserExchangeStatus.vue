<template>
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
        'status'
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
