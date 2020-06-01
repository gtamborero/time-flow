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

          //const div = document.createElement("div");
          //div.innerHTML ='<input type="range" id="myRange" value="20">';
          //console.log(div);

          window.slider = document.createElement("input");
          window.slider.type = "number";
          window.slider.value = 5;
          window.slider.id = "elemento";
          window.slider.step=1;
          window.slider.min = 5;
          window.slider.max = 50;

          this.$swal({
            title: this.$t('Request time to XXX'),
            text: this.$t('Select time to send / request'),
            content: slider,
            buttons: {
              cancel: "Run away!",
              catch: {
                text: "Throw Pokéball!",
                value: window.slider.value,
              },
              defeat: true,
            }
          }).then((value) => {
            console.log(window.slider.value);
            //swal(`You typed: ${value}`);
          });
        }
      }
     }
</script>
