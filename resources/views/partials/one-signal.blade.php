@auth
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {

    OneSignal.init({
      appId: "9e810395-d013-4756-a74b-82f5b6f2848a",
    });
    OneSignal.setExternalUserId({{Auth::user()->id}});
  });
</script>
@endauth