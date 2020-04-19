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
        infoForUser: function (){
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

          if (this.involvedUser == "NotInvolved") return infoNotInvolved;
          if (this.involvedUser == "Buyer") return "buyer. " + infoBuyer;
          if (this.involvedUser == "Seller") return "seller. " + info;
          if (this.involvedUser == "BuyerAndCreator") return "buyer and creator. " + infoBuyerAndCreator;
          if (this.involvedUser == "SellerAndCreator") return "seller and creator. " + info;

        }
      }
    }
</script>
