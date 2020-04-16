<template>
  <div>

    <!-- WHEN PENDING EXCHANGE -->
    <div v-if="canUserAccept()" class="py-3 px-5 bg-primary text-white mb-5 break-words shadow-md relative">
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

    <!-- WHEN ACCEPTED EXCHANGE -->
    <div v-else class="py-3 px-5 bg-primary text-white mb-5 break-words shadow-md relative">
        <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
          <span class="text-sm text-gray-400">{{ created }}</span><br>
        </div>

        <div class="text-center flex-grow">
          Abel {{ $t('have send') }} {{ amount }} {{ $t('minutes') }} {{ $t('for') }}:<br> {{ concept }}
        </div>

        <div class="text-center">
          <a v-if="!rateData" class="inline-block p-2">
            <button class="tf-button tf-button-secondary uppercase" v-on:click="rate">
              {{ $t('Rate to') }} Pedro
            </button>
          </a>
          <!-- WHEN OCKMMENt-->
          <div v-if="rateData" class=" text-white p-3">
         GO COMENT!
         <button class="tf-button tf-button-secondary float-right" v-on:click="stopRate">
           X
         </button>
          </div>
        </div>


    </div>

  </div>
</template>

<script>
    export default {
      props: [
        'id',
        'concept',
        'seller-user',
        'buyer-user',
        'creator-user',
        'actual-user',
        'amount',
        'created',
        'status'
      ],
      data: function () {
        return {
          rateData: 0,
          internalStatus: this.status
        }
      },
      mounted() {
          //console.log('Component mounted.')
      },
      methods: {
        accept: function (){
          axios
            .put('/exchange/' + this.id)
            .then(response => {
              this.internalStatus = 1; // 0: pending, 1:accepted, 2:rejected
              //this.changeStatus();
              console.log(response);
            })
            .catch(error => {
              console.log(error)
            })
            .finally(() => this.loading = false)
        },
        reject: function (){
          alert(event.target.tagName);
        },
        canUserAccept: function (){
          if ((this.internalStatus === 0) && (this.creatorUser != this.actualUser)){
            return 1
          }
          return 0;
        },
        /*changeStatus: function (){
          this.$emit('change-status');
        },*/
        rate: function (){
          this.rateData = 1;
        },
        stopRate: function (){
          this.rateData = 0;
        }
      }
    }
</script>
