<template>
<div>

  <!-- SECOND LINE COMMENTS + STARS -->
  <div class="grid grid-cols-1 bg-white break-words">

    <div class="pb-3 pt-0 px-5 text-center">go
      <div id="rater"></div>
      {{ rating }} stars<br>
      {{ comment }}
    </div>

  </div>

</div>
</template>

<script>
    export default {
      props: [
        'rating',
        'comment'
      ],
      mounted() {
          //console.log('Component mounted.')
      },
      methods: {
      }
    }
</script>
