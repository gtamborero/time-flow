<template>
<div>

  <!-- SECOND LINE COMMENTS + STARS -->
  <div class="grid grid-cols-2 bg-secondary shadow-md break-words">

    <div class="py-2 px-5 text-left">
      5 STARS<br>
      User comment
    </div>

    <div class="py-2 px-5 text-right">
      5 STARS<br>
      User comment
    </div>
  </div>

</div>
</template>

<script>
    export default {
      props: [
        'id',
        'actualUser',
        'status',
      ],
      mounted() {
          //console.log('Component mounted.')
      },
      methods: {
      }
    }
</script>
