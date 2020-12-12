@auth
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    console.log("hi2");
    OneSignal.init({
      appId: "8642fc9f-529a-43e7-9b0e-d82d490569e3",
    });

    
        //console.log(await OneSignal.getUserId());

    OneSignal.setExternalUserId({{Auth::user()->id}});
          // user has subscribed
          //OneSignal.registerForPushNotifications();
  });




</script>
@endauth