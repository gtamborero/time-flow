<template>
  <!-- component simplified from: https://codepen.io/olimorris/pen/yOYBjd -->
  <div class="star-rating">
      <label class="star-rating__star is-disabled" v-for="rating in ratings"
        :class="{'is-selected': directValue >= rating}">
        <input class="star-rating star-rating__checkbox" type="radio"
        v-model="directValue" disabled>★</label>
  </div>
</template>

<script>
    export default {
      props: {
        'direct-value': String
      },
      data: function() {
         return {
           ratings: [1, 2, 3, 4, 5]
         };
       }
     }
</script>
