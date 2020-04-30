<template>
  <div>
      <input
       type="text"
       placeholder="Write something for X"
       v-model="comment"
       name="text"
       autofocus="autofocus"
       class="form-input w-full mt-3 mb-4">

      <button :click="publishComment()" class="tf-button tf-button-secondary uppercase">
        {{ $t('Publish') }}
      </button>

      <button v-on:click="rate=0" class="tf-button tf-button-secondary uppercase">
        {{ $t('Cancel') }}
      </button>
  </div>
</template>

<script>
    export default {
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
            url: '/comment-exchange/55',
            data: {
              comment: "hi there!",
              rating: 5
            }
          }).then(response => {
            //this.changeStatus();
            console.log(response);
          })
          .catch(error => {
            console.log(error)
          })
          .finally(() => this.loading = false)
        }
      }
    }
</script>
