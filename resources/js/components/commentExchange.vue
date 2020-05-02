<template>
  <div>
      <input
       type="text"
       placeholder="Write something for X"
       v-model="comment"
       name="text"
       autofocus="autofocus"
       class="form-input w-full mt-3 mb-4">

      <button v-on:click="publishComment()" class="tf-button tf-button-secondary uppercase">
        {{ $t('Publish') }}
      </button>

      <button v-on:click="rate=0" class="tf-button tf-button-secondary uppercase">
        {{ $t('Cancel') }}
      </button>

      <button v-on:click="increment()" class="tf-button tf-button-secondary uppercase">
        VUEX TEST
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
          comment: ''
        }
      },
      mounted() {
      },
      methods: {
        publishComment: function (){
          axios({
            method: 'put',
            url: '/comment-exchange/' + this.id,
            data: {
              comment: this.comment,
              rating: this.$store.state.exchange[this.id].rating
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
        // vuex test
        increment() {
          this.$store.commit('increment')
          console.log(this.$store.state.count)
        }
      }
    }
</script>
