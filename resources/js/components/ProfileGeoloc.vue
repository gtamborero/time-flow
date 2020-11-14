<template>
<div>
<button @click.prevent="getLocation" class="tf-button tf-button-primary mx-auto uppercase">{{$t('GeoLocate Me')}}!</button>
</div>
</template>

<script>
  export default {
    data: function () {
      return {
        mapKey: 'x6jDGpBDIwvXrgfrX8BxX1w10PLGQDg8'
      }
    },
    mounted(){
      //this.getLocation();
    },
    methods: {
      getLocation: function (){
        if (navigator.geolocation) {
          this.$swal({
              title: this.$t('Can we Geolocate You?'),
              text: this.$t('Your profile will fill up with your Country, State and City so other users can find you'),
              icon: 'info',
              buttons: {
                confirm: {
                  text: this.$t('Ok'),
                  value: true,
                  visible: true,
                  className: "",
                  closeModal: true
                },
                cancel: {
                  text: this.$t('cancel'),
                  value: false,
                  visible: true,
                  className: "",
                  closeModal: true,
                }
              }
            }).then((value) => {
              if (value) {
                navigator.geolocation.getCurrentPosition(this.showPosition);
              }
          });

        } else {
          this.$swal({
            title: this.$t('Geolocation is not supported by this browser'),
            icon: "warning",
            text: this.$t('You will not be able to use GeoLocation'),
            buttons: false,
            timer: 1800
          });
          }
      },

      showPosition: function (position) {
        //console.log("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
        var app = this;
        axios({
          method: 'get',
          url: 'https://www.mapquestapi.com/geocoding/v1/reverse?key=' + this.mapKey + '&location=' + position.coords.latitude + ',' + position.coords.longitude + '&includeRoadMetadata=true&includeNearestIntersection=true',
          }).then(function(response) {

            var locationData = response.data.results[0].locations[0];
            console.log(locationData);

            var locationField = document.getElementById('locationField');
            locationField.value="";
            
            // Set country + city
            if (locationData.adminArea1){
              document.getElementById('country').value=locationData.adminArea1;
            }
            if (locationData.adminArea2){
              document.getElementById('city').value=locationData.adminArea2;
            }else
            if(locationData.adminArea3){
              document.getElementById('city').value=locationData.adminArea3;
            }

            // Show to user editable data:
            if (locationData.adminArea4){
              locationField.value = locationData.adminArea4 + " - ";
            }
            if (locationData.adminArea5){
              locationField.value += locationData.adminArea5 + " - ";
            }
            if (locationData.adminArea6){
              locationField.value += locationData.adminArea6 + " - ";
            }
            if (locationData.postalCode){
              locationField.value += locationData.postalCode;
            }

          }).catch(error => {
            console.log(error)
          });
      },

  }
}

</script>
