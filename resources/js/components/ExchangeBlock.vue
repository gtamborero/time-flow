<template>
  <div :exchange-id="id" class="exchange-block">

      <!-- WHEN PENDING EXCHANGE AND USER CAN ACCEPT -->
      <div class="py-3 px-5 text-white break-words relative text-center"
        v-bind:class="{
          'bg-orange': status == 0, // Pending
          'bg-green': status == 1, // Accepted
          'bg-red': status == -1 // Rejected
        }">

          <div class="md:text-left md:float-left">
            {{getStatusName()}}
          </div>

          <div class="md:text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
            <span class="text-sm text-gray-300">{{ created }}</span><br>
          </div>

          <div class="text-center flex-grow" v-html="infoForUser()"></div>

          <div v-if="status==0 && isInvolvedUser()"
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
          <div v-if="status==1 && isInvolvedBuyer() && !hasComment">
              <div class="text-center py-2">
                <div v-if="!rate" >
                  <button v-on:click="rate=1" class="tf-button tf-button-secondary uppercase">
                    {{ $t('Rate to') }} {{sellerUser.name}}
                  </button>
                </div>


                <!-- WHEN COMMENT-->
                <transition name="slide-fade">
                  <div v-if="rate" class=" text-white">
                    <comment-exchange :id="id"></comment-exchange>
                  </div>
                </transition>
              </div>
          </div>

      </div>

      <two-users
          :id="id"
          :concept="concept"
          :seller-user="sellerUser"
          :buyer-user="buyerUser"
          :amount="amount"
          :seller-gravatar="sellerGravatar"
          :buyer-gravatar="buyerGravatar">
      </two-users>

      <user-rating-results v-if="status==1 && $store.state.exchange[id].comment"
          :id="id"
          :user-name="buyerUser.name"
          >
      </user-rating-results>

  </div>
</template>

<script>
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
        'seller-gravatar',
        'buyerGravatar',

      ],
      data: function () {
        return {
          status: null,
          rate: 0,
          newRating: 0
        }
      },
      mounted() {
        this.status = this.$store.state.exchange[this.id].status;
        this.hasComment = this.$store.state.exchange[this.id].comment

        // Welcome sweet Alert on first login if user
        if (!sessionStorage.getItem('firstAlertDone') && this.actualUserId){
          sessionStorage.setItem('firstAlertDone', 1);
          this.$swal({
            title: this.$t('Welcome'),
            icon: "success",
            text: this.$t('You\'re logged in'),
            buttons: false,
            timer: 1800
          });
        }

      },
      methods: {
        changeStatus: function (){
          axios({
            method: 'put',
            url: '/exchange/' + this.id,
            data: {
              status: this.status
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
          this.status = 1; // 0: pending, 1:accepted, -1:rejected
          this.changeStatus();
          this.$swal({
            title: this.$t('Exchange Accepted'),
            icon: "success",
            text: ' ',
            buttons: false,
            timer: 1800
          });
        },
        reject: function(){
          this.status = -1; // 0: pending, 1:accepted, -1:rejected
          this.changeStatus();
          this.$swal({
            title: this.$t('Exchange Rejected'),
            icon: "error",
            text: ' ',
            buttons: false,
            timer: 1800
          });
        }
      }
    }
</script>
