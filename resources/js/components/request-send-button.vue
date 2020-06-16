<template>
  <div v-if="renderComponent"
    class="fixed bottom-0 p-1 bg-white color1 left-0 right-0 grid grid-cols-2"
    style="border-top:1px solid #ccc;"
    >
      <button v-on:click="createNew('request')"
        class="fixed-button capitalize">
        REQUEST TIME TO<br> {{profileUserName}}
      </button>
      <button v-on:click="createNew('send')"
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
        createNew: function (type){

          var form = document.createElement("div");
          form.innerHTML = `
          <input placeholder="${this.$t('Write the Concept...')}"
          id="tfConcept" type="text" name="concept"
          class="box-border p-2 mb-3 rounded-md"
          style="border: 1px solid #999; width:100%; text-align:center;" ><br>
          <span id="tfHours">0</span> hours<br>
          <input style="width:90%;" type="range" name="tfHours" value=0 step=1 min=0 max=25
          onchange="window.changeHours(this.value)"
          oninput="window.changeHours(this.value)"
          ><br>
          <span id="tfMinutes">0</span> min<br>
          <input style="width:60%;" type="range" name="tfMinutes" value=0 step=5 min=0 max=60
          onchange="window.changeMinutes(this.value)"
          oninput="window.changeMinutes(this.value)"
          >
          `;

          if (type == 'request') var typeTitle = this.$t('Request time to');
          if (type == 'send') var typeTitle = this.$t('Send time to');

          this.$swal({
            title: typeTitle + " "
              + this.profileUserName.charAt(0).toUpperCase()
              + this.profileUserName.substring(1),
            /*text: '',*/
            content: form,
            buttons: {
              cancel: "Cancel",
              catch: {
                text: "Create",
                value: 5,
              },
            }
          }).then((value) => {
            //console.log(tfHours.innerHTML);
            //swal(`You typed: ${value}`);
              axios({
                method: 'post',
                url: '/exchange',
                data: {
                  userId: this.actualUserId,
                  profileId: this.profileUserId,
                  hours: tfHours.innerHTML,
                  min: tfMinutes.innerHTML,
                  type: type,
                  concept: document.getElementById("tfConcept").value
                }
              }).then(response => {
                //this.changeStatus();
                console.log(response);
                location.reload();
              })
              .catch(error => {
                console.log(error)
              })
              .finally(() => this.loading = false)
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
