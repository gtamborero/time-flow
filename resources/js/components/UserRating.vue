<template>
<div>
  <!-- LINE COMMENTS + STARS -->
  <div  class="grid grid-cols-1 bg-white break-words">
    <div class="pb-3 pt-0 px-5 text-center star-container">
      <star-rating v-model="rating" disabled></star-rating>
      {{ userName }} {{ $t('said') }}: {{comment}}
    </div>
  </div>
</div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
      props: [
        'id',
        'rating',
        'user-name',
        'status'
      ],
      data: function(){
        return {
          //comment: this.getComment(this.id)
        }
      },
      mounted() {
          //console.log('Component mounted.')
      },
      methods: {
      },
      computed: {
        comment: function (){
          return this.getComment(this.id)
        },
        ...mapGetters(['getRating','getComment'])
      }
    }
</script>
