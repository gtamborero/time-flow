<template>
  <div v-if="renderComponent"
    class="fixed bottom-0 p-1 bg-white color1 left-0 right-0 grid grid-cols-2"
    style="border-top:1px solid #ccc;"
    >
      <button v-on:click="createNew()"
        class="fixed-button capitalize">
        REQUEST TIME TO<br> {{profileUserName}}
      </button>
      <button v-on:click="createNew()"
        class="fixed-button capitalize">
        SEND TIME TO<br>  {{profileUserName}}
      </button>
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
        createNew: function (){

          const div = document.createElement("div");
          div.innerHTML ="<input type=range id='111' value='one'></input></br>second<input id='222' value='two'></input></br>third<input id='333' value='three'></input>";
          //console.log(div);

          this.$swal({
            title: this.$t('Request time to XXX'),
            //icon: "success",
            text: this.$t('You\'re logged in'),
            content: div,
            buttons: [true, "Create"]
          }).then((value) => {
            console.log(value);
            //swal(`You typed: ${value}`);
          });
        }
      }
     }
</script>
