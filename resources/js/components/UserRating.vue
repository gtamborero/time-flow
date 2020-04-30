<template>
<div>

  <!-- SECOND LINE COMMENTS + STARS -->
  <div v-if="status == 1 && comment" class="grid grid-cols-1 bg-white break-words">

    <div class="pb-3 pt-0 px-5 text-center star-container">
      <star-rating v-model="rating" disabled></star-rating>
      {{ userName }} {{ $t('said') }}: {{ comment }}
    </div>

  </div>

</div>
</template>

<script>
    export default {
      props: [
        'rating',
        'comment',
        'user-name',
        'status'
      ],
      mounted() {
          //console.log('Component mounted.')

      },
      methods: {
      }
    }
</script>
