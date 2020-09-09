<template>
<div>

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
      this.getLocation();
    },
    methods: {
      getLocation: function (){
        if (navigator.geolocation) {
          this.$swal({
              title: this.$t('Can we Geolocate You?'),
              text: this.$t('Your profile will fill up with your Country, State and City so other timebankers can find you'),
              icon: 'info',
              buttons: {
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "",
                  closeModal: true
                },
                cancel: {
                  text: "Cancel",
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

      saveUserLocation: function(locationData){
        alert(locationData);
      },

      showPosition: function (position) {
        //console.log("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);

        axios({
          method: 'get',
          url: 'https://www.mapquestapi.com/geocoding/v1/reverse?key=' + this.mapKey + '&location=' + position.coords.latitude + ',' + position.coords.longitude + '&includeRoadMetadata=true&includeNearestIntersection=true',
          }).then(function(response) {
            console.log(response.data.results[0].locations[0]);
            var location = document.getElementById("location");

            window.locationData = response.data.results[0].locations[0];

            var locationField = document.getElementById('locationField');

            if (window.locationData.adminArea1){
              locationField.innerHTML = window.locationData.adminArea1 + " - ";
            }
            if (window.locationData.adminArea2){
              locationField.innerHTML += window.locationData.adminArea2 + " - ";
            }
            if (window.locationData.adminArea3){
              locationField.innerHTML += window.locationData.adminArea3 + " - ";
            }
            if (window.locationData.adminArea4){
              locationField.innerHTML = window.locationData.adminArea4 + " - ";
            }
            if (window.locationData.adminArea5){
              locationField.innerHTML += window.locationData.adminArea5 + " - ";
            }
            if (window.locationData.adminArea6){
              locationField.innerHTML += window.locationData.adminArea6 + " - ";
            }
            if (window.locationData.postalCode){
              locationField.innerHTML += window.locationData.postalCode;
            }

          }).catch(error => {
            console.log(error)
          });

          setTimeout(() => {
            this.saveUserLocation(window.locationData);
          },2000);
      },

  }
}

</script>
