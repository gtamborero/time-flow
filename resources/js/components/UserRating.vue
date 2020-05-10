<template>
<div>
  <!-- LINE COMMENTS + STARS -->
  <div  class="grid grid-cols-1 bg-white break-words">
    <div class="pb-3 pt-0 px-5 text-center star-container">
      <star-rating :id="id" :temp-value="rating"></star-rating>
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
        'user-name'
      ],
      data: function(){
        return {
          comment: '',
          rating: 0
        }
      },
      mounted() {
        this.comment = this.getComment(this.id);
        this.rating = this.getRating(this.id);
          //console.log('Component mounted.')
      },
      methods: {
      },
      computed: mapGetters(['getRating','getComment'])
    }
</script>
