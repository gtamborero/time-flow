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

      showPosition: function (position) {
        //console.log("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);

      axios({
        method: 'get',
        url: 'https://www.mapquestapi.com/geocoding/v1/reverse?key=' + this.mapKey + '&location=' + position.coords.latitude + ',' + position.coords.longitude + '&includeRoadMetadata=true&includeNearestIntersection=true',
        }).then(function(response) {
          console.log(response.data.results[0].locations[0]);
          var location = document.getElementById("location");

          var locationData = response.data.results[0].locations[0];

          var locationField = document.getElementById('locationField');

          if (locationData.adminArea1){
            locationField.innerHTML = locationData.adminArea1 + " - ";
            document.getElementById('country').value = locationData.adminArea1;
          }
          if (locationData.adminArea2){
            locationField.innerHTML += locationData.adminArea2 + " - ";
            document.getElementById('country').value += ', ' + locationData.adminArea2;
          }
          if (locationData.adminArea3){
            locationField.innerHTML += locationData.adminArea3 + " - ";
            document.getElementById('country').value += ', ' +locationData.adminArea3;
          }
          if (locationData.adminArea4){
            locationField.innerHTML = locationData.adminArea4 + " - ";
            document.getElementById('city').value = locationData.adminArea4;
          }
          if (locationData.adminArea5){
            locationField.innerHTML += locationData.adminArea5 + " - ";
            document.getElementById('town').value = locationData.adminArea5;
          }
          if (locationData.adminArea6){
            locationField.innerHTML += locationData.adminArea6 + " - ";
            document.getElementById('town').value = locationData.adminArea6;
          }
          if (locationData.postalCode){
            locationField.innerHTML += locationData.postalCode;
            document.getElementById('postalcode').value = locationData.postalCode;
          }


        }).catch(error => {
          console.log(error)
        })
      }
  }
}

</script>
