<template>
  <!-- component from: https://codepen.io/olimorris/pen/yOYBjd -->
  <div class="star-rating">
          <label class="star-rating__star" v-for="rating in ratings"
          :class="{'is-selected': ((temp_value >= rating) && temp_value != null),
          'is-disabled': disabled}"
          v-on:click="set(rating)" v-on:mouseover="star_over(rating)"
          v-on:mouseout="star_out">
          <input class="star-rating star-rating__checkbox"
          type="radio" :name="name"
          :value="finalValue" :disabled="disabled">★</label></div>
</template>

<script>
    export default {
      props: {
        'name': String,
        'value': null,
        'id': String,
        'disabled': Boolean,
        'required': Boolean
      },
      mounted() {
          //console.log('Component mounted.')

      },
      data: function() {
         return {
           temp_value: this.value,
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
             //this.temp_value = this.value;
             return this.temp_value = index;
           }

         },

         /*
          * Behaviour of the stars on mouseout.
          */
         star_out: function() {

           if (!this.disabled) {
             return this.temp_value = this.finalValue;
           }
         },

         /*
          * Set the rating.
          */
         set: function(value) {


           if (!this.disabled) {

             this.finalValue = value;
             //return this.temp_value = index;
             //this.temp_value = value;
           }
         }
       }
     }
</script>
