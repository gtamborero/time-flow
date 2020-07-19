<template>
  <div v-if="visibleComponent">

      <star-rating :id="id"></star-rating>

      <input
       type="text"
       placeholder="Write a comment about the received service"
       v-model="$store.state.exchange[id].comment"
       name="text"
       autofocus="autofocus"
       class="form-input w-full mt-3 mb-4">

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
                timer: 1800
              });

          })
          .catch(error => {
            console.log(error)
          })
          .finally()
        }
      }
    }
</script>
