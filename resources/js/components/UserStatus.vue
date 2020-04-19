<template>
  <div>
      <!-- WHEN PENDING EXCHANGE AND USER CAN ACCEPT -->
      <div class="py-3 px-5 bg-primary text-white break-words relative">
          <div class="text-right flex-grow md:float-right md:right-0 md:pr-5 md:absolute">
            <span class="text-sm text-gray-400">{{ created }}</span><br>
          </div>

          <div class="text-center flex-grow" v-html="infoForUser()"></div>

          <div v-if="internalStatus==0
                &&
                (involvedUser == 'Buyer' || involvedUser == 'Seller')"
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
          <div v-if="internalStatus==1">
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
          internalStatus: this.status,
          involvedUser: 0,
          siblingUser: 0
        }
      },
      mounted() {
          this.involvedUser = this.getInvolvedUserState();
          this.siblingUser = this.getSiblingUser();
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
        /*changeStatus: function (){
          this.$emit('change-status');
        },*/
        getSiblingUser: function (){
          if (this.actualUserId == this.buyerUser.id) return this.sellerUser.name;
          if (this.actualUserId == this.sellerUser.id) return this.buyerUser.name;
        },
        infoForUser: function (){
          var info = `${this.siblingUser}
            ${this.$t('sends you')}
            ${this.amount}
            ${this.$t('minutes')}
            ${this.$t('for')}
            <br>
            ${this.concept}`;

          if (this.involvedUser == "NotInvolved") return info;
          if (this.involvedUser == "Buyer") return "buyer. " + info;
          if (this.involvedUser == "Seller") return "seller. " + info;
          if (this.involvedUser == "BuyerAndCreator") return "buyer and creator. " + info;
          if (this.involvedUser == "SellerAndCreator") return "seller and creator. " + info;

        },
        getInvolvedUserState: function (){
          // NOT INVOLVED USER
          if ( (this.actualUserId != this.buyerUser.id) &&
            (this.actualUserId != this.sellerUser.id) )
            return "NotInvolved";

          // ACTUAL USER IS BUYER --> Then... Accept o reject transaction
          if ( (this.actualUserId == this.buyerUser.id) &&
            (this.actualUserId != this.creatorUserId) )
            return "Buyer";

          // ACTUAL USER IS SELLER --> Then... Accept o reject transaction
          if ( (this.actualUserId == this.sellerUser.id) &&
            (this.actualUserId != this.creatorUserId) )
            return "Seller";

          // ACTUAL USER IS BUYER AND CREATOR --> Then... Please Wait!
          if ( (this.actualUserId == this.buyerUser.id) &&
            (this.actualUserId == this.creatorUserId) )
            return "BuyerAndCreator";

          // ACTUAL USER IS SELLER AND CREATOR --> Then... Please Wait!
          if ( (this.actualUserId == this.sellerUser.id) &&
            (this.actualUserId == this.creatorUserId) )
            return "SellerAndCreator";
        }
      }
    }
</script>
