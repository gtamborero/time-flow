<template>
<div>
  <!-- VIEW OF USER COMMENT + RATING STARS APLIED -->
  <div class="grid grid-cols-1 bg-white break-words pt-2" style="background-color:#f7f7f7; border-top:1px solid #ddd;">
    <div class="pb-3 pt-0 px-5 text-center star-container">

      <span class="capitalize">
         {{ userName }}</span> {{ $t('said') }}:

      <span class="inline">
        {{$store.state.exchange[id].comment}}
      </span>
      <br>
      <star-rating :id="id" disabled></star-rating>

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
