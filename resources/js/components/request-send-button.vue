<template>
  <div v-if="renderComponent">
      <!--<button v-on:click="createNew('request')"
        class="fixed-button">
        {{ $t('Request time to') }}<br> {{profileUserName}}
      </button>-->
      <button v-on:click="createNew('send')"
        class="tf-button tf-button-3 items-center mx-2 w-4/5 md:w-1/2 text-lg font-medium uppercase">
        {{ $t('Pay to') }} {{profileUserName}}
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
          class="box-border p-3 text-lg rounded-md text-center w-full"
          maxlength="120"
          style="border: 1px solid #999; margin-bottom:25px;" ><br>

          <span id="tfHours" class="text-xl">0</span> ${this.$t('hours')}<br>
          <input style="width:100%; margin:8px 0 25px;" type="range" name="tfHours" value=0 step=1 min=0 max=23
          autocomplete="off"
          onchange="window.changeHours(this.value)"
          oninput="window.changeHours(this.value)"
          ><br>

          <span id="tfMinutes" class="text-xl">0</span> ${this.$t('minutes')}<br>
          <input style="width:100%; margin:8px 0 25px;" type="range" name="tfMinutes" value=0 step=5 min=0 max=55
          autocomplete="off"
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
              cancel: this.$t('cancel'),
              catch: {
                text: this.$t('create'),
                value: 5,
              },
            }
          }).then((value) => {

            // If cancel or click outside do nothing
            if (!value) return 0;

            // If user do not write the concept do alert
            if (!document.getElementById("tfConcept").value) {
              this.$swal({
                title: this.$t('Ups!'),
                icon: "info",
                text: this.$t('You must write the concept'),
                buttons: false,
                timer: 2000
              })
            }

            // If user sets a zero value do alert
            if (parseInt(tfHours.innerHTML) + parseInt(tfMinutes.innerHTML) == 0) {
              this.$swal({
                title: this.$t('Ups!'),
                icon: "info",
                text: this.$t('You must pay something'),
                buttons: false,
                timer: 2000
              })
            }

            // If everything is ok then GO!
              axios({
                method: 'post',
                url: '/exchange',
                data: {
                  actualUserId: this.actualUserId,
                  involvedUserId: this.profileUserId,
                  hours: tfHours.innerHTML,
                  minutes: tfMinutes.innerHTML,
                  type: type,
                  concept: document.getElementById("tfConcept").value
                }
              },
              this.$swal({
                title: this.$t('Sending data...'),
                icon: "success",
                text: this.$t('Please wait until page refresh'),
                buttons: false,
                timer: 2000
              })
            ).then(response => {
                //this.changeStatus();
                //console.log(response);
                location.replace('/exchange-view/' + response.data);
              })
              .catch(error => {
                console.log(error)
              })
          });
        }
      }
     }

     // Outside functions
     window.changeHours = function (value){
       var tfHours = document.getElementById("tfHours");
       tfHours.innerHTML = value;
     }
     window.changeMinutes = function (value){
       var tfMinutes = document.getElementById("tfMinutes");
       tfMinutes.innerHTML = value;
     }
</script>
