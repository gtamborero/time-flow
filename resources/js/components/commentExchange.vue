<template>
  <div v-if="visibleComponent">

      <textarea
       :placeholder="$t('Write a comment about the exchange')"
       v-model="$store.state.exchange[id].comment"
       name="text"
       autofocus="autofocus"
       class="form-input w-full mt-3 mb-4 text-black"></textarea>

       {{ $t('Rate your satisfaction level') }}:<br>
      <star-rating class="pb-3" :id="id"></star-rating>
<br>
      <button v-on:click="publishComment()" class="tf-button tf-button-secondary uppercase">
        {{ $t('Publish') }}
      </button>
  </div>
</template>

<script>

  export default {
    props: [
      'id'
    ],
    data: function () {
      return {
        visibleComponent: 1
      }
    },
    methods: {
      publishComment: function (){
        // Check if comment and rating is set
        if (!this.isCommentedAndRated()) return false;

        this.visibleComponent = 0;

        axios({
          method: 'put',
          url: '/comment-exchange/' + this.id,
          data: {
            comment: this.$store.state.exchange[this.id].comment,
            rating: this.$store.state.exchange[this.id].rating
          }
        }).then(response => {
          // action on end ajax: Show Sweet alert:
            this.$swal({
              title: this.$t('Rating Saved'),
              icon: "success",
              text: " ",
              buttons: false,
              timer: 1200
            });

        })
        .catch(error => {
          console.log(error)
        })
        .finally()
      },

      isCommentedAndRated: function(){
        if (this.$store.state.exchange[this.id].comment.length < 2){
            this.$swal({
              title: this.$t('Please write a Comment'),
              icon: "warning",
              text: " ",
              buttons: false,
              timer: 1800
            });
            return false;
        }
        if (this.$store.state.exchange[this.id].rating < 1){
          this.$swal({
            title: this.$t('Please Rate'),
            icon: "warning",
            text: "Click on the stars!",
            buttons: false,
            timer: 1800
          });
          return false;
        }
        return true;
      }
    }
  }
</script>
