<template>
  <div :exchange-id="id" class="exchange-block">
      <!-- WHEN PENDING EXCHANGE AND USER CAN ACCEPT -->
      <div class="py-3 px-5 text-white break-words relative"
        v-bind:class="{
          'bg-primary': internalStatus == 0, // Pending
          'bg-green': internalStatus == 1, // Accepted
          'bg-red': internalStatus == -1 // Rejected
        }">
          <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
            <span class="text-sm text-gray-400">{{ created }}</span><br>
          </div>

          <div class="text-center flex-grow" v-html="infoForUser()"></div>

          <div v-if="internalStatus==0 && isInvolvedUser()"
                class="text-center">
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

          <!-- WHEN ACCEPTED EXCHANGE -->
          <!-- SHOW IF THERES NO SET COMMENT and USER IS INVOLVED BUYER -->
          <div v-if="internalStatus==1 && isInvolvedBuyer()">
              <div class="text-center py-2">
                <div v-if="!rate" v-on:click="rate=1">
                  <button class="tf-button tf-button-secondary uppercase">
                    {{ $t('Rate to') }} {{sellerUser.name}}
                  </button>
                  <button class="tf-button tf-button-secondary uppercase">
                    {{ $t('Rate later') }}
                  </button>
                </div>

                <!-- WHEN COMMENT-->
                <div v-if="rate" class=" text-white">
                  <comment-exchange :id="id"></comment-exchange>
                </div>
              </div>
          </div>

          <!-- WHEN REJECTED EXCHANGE -->
          <div v-if="internalStatus==-1">
              <div class="text-center py-2">
                {{ $t('Was rejected') }}
              </div>
          </div>

      </div>

      <user-exchange
          :id="id"
          :concept="concept"
          :seller-user="sellerUser"
          :buyer-user="buyerUser"
          :amount="amount"
          :status="status"
          :seller-gravatar="sellerGravatar"
          :buyer-gravatar="buyerGravatar">
      </user-exchange>

      <user-rating
          :id="id"
          :user-name="buyerUser.name"
          :status="status"
          >
      </user-rating>

  </div>
</template>

<script>
    import { mapMutations } from 'vuex';
    import UserUtilityMixin from './UserUtilityMixin.vue';
    export default {
      mixins: [UserUtilityMixin],
      props: [
        'id',
        'concept',
        'seller-user',
        'buyer-user',
        'creator-user-id',
        'actual-user-id',
        'amount',
        'created',
        'status',
        'seller-gravatar',
        'buyerGravatar',

      ],
      data: function () {
        return {
          internalStatus: this.status,
          rate: 0,
          newRating: 0
        }
      },
      methods: {
        changeStatus: function (){
          axios({
            method: 'put',
            url: '/exchange/' + this.id,
            data: {
              status: this.internalStatus
            }
          }).then(response => {
            //this.changeStatus();
            console.log(response);
          })
          .catch(error => {
            console.log(error)
          })
          .finally(() => this.loading = false)
        },
        accept: function(){
          this.internalStatus = 1; // 0: pending, 1:accepted, -1:rejected
          this.changeStatus();
        },
        reject: function(){
          this.internalStatus = -1; // 0: pending, 1:accepted, -1:rejected
          this.changeStatus();
        },
        ...mapMutations(['initExchanges'])
      }
    }
</script>
