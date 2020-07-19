<!-- MIXIN FOR EXCHANGEBLOCK.VUE -->
<script>
    export default {
      data: function () {
        return {
          involvedUser: 0,
          siblingUser: 0,
          user: 0
        }
      },
      mounted() {
          this.involvedUser = this.getInvolvedUserState();
          this.siblingUser = this.getSiblingUser();
      },
      methods: {
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
        },
        getSiblingUser: function (){
          if (this.actualUserId == this.buyerUser.id) return this.sellerUser.name;
          if (this.actualUserId == this.sellerUser.id) return this.buyerUser.name;
        },
        isInvolvedBuyer: function(){
          if ( this.involvedUser == 'Buyer' || this.involvedUser == 'BuyerAndCreator' ) return 1;
        },
        isInvolvedUser: function(){
          if (this.involvedUser == 'Buyer' || this.involvedUser == 'Seller') return 1;
        },
        infoForUser: function (){

          // Messanges when exchange status is pending
          if (this.status == 0){

              var infoNotInvolved = `${this.buyerUser.name}
                ${this.$t('sended')}
                ${this.amount}
                ${this.$t('to')}
                ${this.sellerUser.name}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var info = `${this.siblingUser}
                ${this.$t('wants to sends you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyerAndCreator = `${this.siblingUser}
                ${this.$t('wants to received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyer = `${this.siblingUser}
                ${this.$t('wants to received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;
          }

          // Messages when exchange status is Accepted
          if (this.status == 1){

              var infoNotInvolved = `${this.buyerUser.name}
                ${this.$t('sended')}
                ${this.amount}
                ${this.$t('to')}
                ${this.sellerUser.name}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var info = `${this.siblingUser}
                ${this.$t('sends you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyerAndCreator = `${this.siblingUser}
                ${this.$t('has received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyer = `${this.siblingUser}
                ${this.$t('has received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;
          }

          // Messages when exchange status is Rejected
          if (this.status == -1){

              var infoNotInvolved = `${this.buyerUser.name}
                ${this.$t('sended')}
                ${this.amount}
                ${this.$t('to')}
                ${this.sellerUser.name}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var info = `${this.siblingUser}
                ${this.$t('sended you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyerAndCreator = `${this.siblingUser}
                ${this.$t('has received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;

              var infoBuyer = `${this.siblingUser}
                ${this.$t('has received from you')}
                ${this.amount}
                ${this.$t('minutes')}
                ${this.$t('for')}
                <br>
                ${this.concept}`;
          }

          if (this.involvedUser == "NotInvolved") return infoNotInvolved;
          if (this.involvedUser == "Buyer") return infoBuyer; // buyer
          if (this.involvedUser == "Seller") return info; // seller
          if (this.involvedUser == "BuyerAndCreator") return infoBuyerAndCreator; // "buyer and creator
          if (this.involvedUser == "SellerAndCreator") return info; // seller and creator

        }
      }
    }
</script>
