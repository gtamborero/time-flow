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

          var form = document.createElement("div");
          form.innerHTML = `
          <span id="tfHours">0</span> hours<br>
          <input style="width:90%;" type="range" name="tfHours" value=0 step=1 min=0 max=25
          onchange="window.changeHours(this.value)"
          oninput="window.changeHours(this.value)"
          ><br>
          <span id="tfMinutes">0</span> min<br>
          <input style="width:60%;" type="range" name="tfMinutes" value=0 step=5 min=0 max=60
          onchange="window.changeMinutes(this.value)"
          oninput="window.changeMinutes(this.value)"
          ><br>
          `;

          this.$swal({
            title: this.$t('Request time to XXX'),
            text: this.$t('Select time to send / request'),
            content: form,
            buttons: {
              cancel: "Cancel",
              catch: {
                text: "Create",
                value: 5,
              },
            }
          }).then((value) => {
            console.log(slider.value);
            //swal(`You typed: ${value}`);
          });
        }
      }
     }
     window.changeHours = function (value){
       var tfHours = document.getElementById("tfHours");
       tfHours.innerHTML = value;
     }
     window.changeMinutes = function (value){
       var tfMinutes = document.getElementById("tfMinutes");
       tfMinutes.innerHTML = value;
     }
</script>
