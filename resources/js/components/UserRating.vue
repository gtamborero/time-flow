<template>
<div>
  <!-- LINE COMMENTS + STARS -->
  <div  class="grid grid-cols-1 bg-white break-words">
    <div class="pb-3 pt-0 px-5 text-center star-container">
      <star-rating :id="id" :temp-value="getRating(id)" disabled></star-rating>
      {{ userName }} {{ $t('said') }}: {{getComment(id)}}
    </div>
  </div>
</div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
      props: [
        'id',
        'user-name'
      ],
      computed: mapGetters(['getRating','getComment'])
    }
</script>
