<template>
<div>
  <!-- LINE COMMENTS + STARS -->
  <div  class="grid grid-cols-1 bg-white break-words">
    <div class="pb-3 pt-0 px-5 text-center star-container">
      <star-rating :id="id" disabled></star-rating>
      {{ userName }} {{ $t('said') }}: {{$store.state.exchange[id].comment}}
    </div>
  </div>
</div>
</template>

<script>
    export default {
      props: [
        'id',
        'user-name'
      ]
    }
</script>
