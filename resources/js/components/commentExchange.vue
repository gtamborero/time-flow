<template>
  <div v-if="visibleComponent">

      <star-rating :id="id" :value="myRating()" v-on:finalValue="setValue"></star-rating>

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
          rating: 0,
          visibleComponent: 1
        }
      },
      mounted() {
        this.comment = this.myComment();
        this.rating = this.myRating();
      },
      methods: {
        publishComment: function (){
          axios({
            method: 'put',
            url: '/comment-exchange/' + this.id,
            data: {
              comment: this.comment,
              rating: this.rating
            }
          }).then(response => {
            //this.changeStatus();
            this.visibleComponent = 0;
            this.setComment({
              id: this.id,
              comment: this.comment
            });
            this.setRating({
              id: this.id,
              comment: this.rating
            });
            //console.log(response);
          })
          .catch(error => {
            console.log(error)
          })
          .finally(() => this.loading = false)
        },
        myComment: function (){
          return this.getComment(this.id)
        },
        myRating: function (){
          return this.getRating(this.id)
        },
        setValue: function (value){
          this.rating = value;
        },
        ...mapMutations(['setComment','setRating'])
      },
      computed: mapGetters(['getRating','getComment'])
    }
</script>
