<template>
  <!-- component from: https://codepen.io/olimorris/pen/yOYBjd -->
  <div class="star-rating">
      <label class="star-rating__star" v-for="rating in ratings"
      :class="{'is-selected': ((tempValue >= rating) && tempValue != null),
      'is-disabled': disabled}"
      v-on:click.stop.prevent="set(rating)" v-on:mouseover="star_over(rating)"
      v-on:mouseout="star_out">
          <input class="star-rating star-rating__checkbox"
          type="radio" :name="name"
          :value="finalValue" :disabled="disabled">★</label>
  </div>
</template>

<script>
    import { mapMutations } from 'vuex';
    export default {
      props: {
        'name': String,
        'value': null,
        'disabled': Boolean,
        'required': Boolean,
        'id': String
      },
      mounted() {
          //console.log('Component mounted.')
      },
      data: function() {
         return {
           tempValue: this.value,
           finalValue: this.value,
           ratings: [1, 2, 3, 4, 5]
         };
       },
       methods: {
         /*
          * Behaviour of the stars on mouseover.
          */
         star_over: function(index) {
           if (!this.disabled) {
             return this.tempValue = index;
           }
         },

         /*
          * Behaviour of the stars on mouseout.
          */
         star_out: function() {
           if (!this.disabled) {
             return this.tempValue = this.finalValue;
           }
         },

         /*
          * Set the rating.
          */
         set: function(value) {
           if (!this.disabled) {
             this.finalValue = value;
             this.$emit('finalValue', value );
           }
         }
       }
     }
</script>
