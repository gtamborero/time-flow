<template>
<div>

  <!-- SECOND LINE COMMENTS + STARS -->
  <div class="grid grid-cols-1 bg-white break-words">

    <div class="pb-3 pt-0 px-5 text-center">
      <div class="w-auto inline-block">
        <star-rating :rating="rating"></star-rating>
      </div>
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
