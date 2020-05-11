<template>
  <div v-if="visibleComponent">

      <star-rating :id="id"></star-rating>

      <input
       type="text"
       placeholder="Write a comment about the received service"
       v-model="comment"
       name="text"
       autofocus="autofocus"
       class="form-input w-full mt-3 mb-4">

      <button v-on:click="publishComment()" class="tf-button tf-button-secondary uppercase">
        {{ $t('Publish') }}
      </button>

      <button class="tf-button tf-button-secondary uppercase">
        {{ $t('Cancel') }}
      </button>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { mapMutations } from 'vuex';

    export default {
      props: [
        'id'
      ],
      data: function () {
        return {
          comment: '',
          visibleComponent: 1
        }
      },
      mounted() {
         this.comment = this.getComment(this.id);
      },
      methods: {
        publishComment: function (){

          this.visibleComponent = 0;
          this.setComment({
            id: this.id,
            comment: this.comment
          });

          axios({
            method: 'put',
            url: '/comment-exchange/' + this.id,
            data: {
              comment: this.comment,
            }
          }).then(response => {
            // action on end ajax
          })
          .catch(error => {
            console.log(error)
          })
          .finally()
        },
        ...mapMutations(['setComment'])
      },
      computed: mapGetters(['getComment'])
    }
</script>
