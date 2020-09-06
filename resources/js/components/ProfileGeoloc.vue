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
              title: 'Can we Geolocate You?',
              text: "So you can fill your profile faster",
              icon: 'warning',
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
            }).then((result) => {
              if (result) {
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
        console.log("Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude);

      axios({
        method: 'get',
        url: 'https://www.mapquestapi.com/geocoding/v1/reverse?key=' + this.mapKey + '&location=' + position.coords.latitude + ',' + position.coords.longitude + '&includeRoadMetadata=true&includeNearestIntersection=true',
        }).then(function(response) {
          console.log(response.data.results[0].locations[0]);
          var location = document.getElementById("location");
          location.innerHTML += response.data.results[0].locations[0].adminArea1;
          location.innerHTML += response.data.results[0].locations[0].adminArea3;
          location.innerHTML += response.data.results[0].locations[0].adminArea4;
          location.innerHTML += response.data.results[0].locations[0].adminArea5;
          location.innerHTML += response.data.results[0].locations[0].adminArea6;
          location.innerHTML += response.data.results[0].locations[0].postalCode;

        }).catch(error => {
          console.log(error)
        })
      }
  }
}

</script>
