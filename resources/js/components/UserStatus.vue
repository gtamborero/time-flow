<template>
  <div>

    <div v-if="internalStatus==0">
      <!-- WHEN PENDING EXCHANGE AND USER CAN ACCEPT -->
      <div v-if="canUserAccept()" class="py-3 px-5 bg-primary text-white break-words relative">
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

      <!-- WHEN PENDING EXCHANGE AND USER IS WAITING ACCEPTANCE -->
      <div v-if="!canUserAccept() && isUserWaitingPayment()" class="py-3 px-5 bg-primary text-white break-words shadow-md relative">
          <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
            <span class="text-sm text-gray-400">{{ created }}</span><br>
          </div>

          <div class="text-center flex-grow">
             {{ $t('You asked') }} Paco, {{ $t('for') }} {{ amount }} {{ $t('minutes') }}:<br> {{ concept }}
             <br>
             {{ $t('Awaiting his approval') }}
          </div>
      </div>

      <div v-if="!canUserAccept() && isUserWaitingCharge()" class="py-3 px-5 bg-primary text-white break-words shadow-md relative">
          <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
            <span class="text-sm text-gray-400">{{ created }}</span><br>
          </div>

          <div class="text-center flex-grow">
             {{ $t('You are waiting') }} Paco, {{ $t('to accept') }} {{ amount }} {{ $t('minutes') }} {{ $t('for') }}:<br> {{ concept }}
          </div>
      </div>
    </div>

    <div v-if="internalStatus==1">
      <!-- WHEN ACCEPTED EXCHANGE -->
      <div v-if="canUserRate()" class="py-3 px-5 bg-primary text-white break-words shadow-md relative">
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

  </div>
</template>

<script>
    export default {
      props: [
        'id',
        'concept',
        'seller-user',
        'buyer-user',
        'creator-user-id',
        'actual-user-id',
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
          if ((this.internalStatus === 0) && (this.creatorUserId != this.actualUserId)){
            return 1
          }
          return 0;
        },
        isUserWaitingPayment: function (){
          if (this.sellerUser.id == this.actualUserId){
            return 1;
          }
          return 0;
        },
        isUserWaitingCharge: function (){
          if (this.buyerUser.id == this.actualUserId){
            return 1;
          }
          return 0;
        },
        canUserRate: function (){
          if ( (this.sellerUser.id == this.actualUserId) || (this.buyerUser.id == this.actualUserId) ){
            return 1;
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
