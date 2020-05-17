<template>
  <!-- component simplified from: https://codepen.io/olimorris/pen/yOYBjd -->
  <div class="star-rating">
      <label class="star-rating__star" v-for="rating in ratings"
      :class="{'is-selected': $store.state.exchange[id].rating >= rating,
      'is-disabled': disabled}"
      v-on:click.stop.prevent="set(rating)">
        <input class="star-rating star-rating__checkbox" type="radio"
        v-model="$store.state.exchange[id].rating">★</label>
  </div>
</template>

<script>
    export default {
      props: {
        'disabled': Boolean,
        'id': String
      },
      data: function() {
         return {
           ratings: [1, 2, 3, 4, 5]
         };
       },
      methods: {
        set: function(value) {
          if (!this.disabled) {
            this.$store.state.exchange[this.id].rating = value;
          }
        }
      }
     }
</script>
