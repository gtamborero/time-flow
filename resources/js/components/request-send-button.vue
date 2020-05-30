<template>
  <div v-if="renderComponent" class="fixed bottom-0 color1 left-0 right-0 grid grid-cols-2">
    <a href="http://time-flow.test/search">
      <button class="fixed-button capitalize">
        REQUEST TIME TO<br> {{profileUserName}}
      </button>
    </a>
    <a href="http://time-flow.test/search">
      <button class="fixed-button capitalize">
        SEND TIME TO<br>  {{profileUserName}}
      </button>
    </a>
  </div>
</template>

<script>
    export default {
      props: [
        'profile-user-id',
        'profile-user-name',
        'actual-user-id'
      ],
      data: function() {
         return {
           renderComponent: 0
         };
       },
       mounted() {
         // Show exchange buttons if user is not watching his own profile
         if (this.profileUserId != this.actualUserId) this.renderComponent = 1;
       },
      methods: {
      }
     }
</script>
