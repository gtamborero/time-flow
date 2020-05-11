<template>
  <!-- component from: https://codepen.io/olimorris/pen/yOYBjd -->
  <div>
    STARS: <input v-model="$store.state.exchange[id].rating" type="number" :disabled="disabled"></label>
  </div>
</template>

<script>
    export default {
      props: {
        'disabled': Boolean,
        'id': String,
      },
       methods: {
       }
     }
</script>
