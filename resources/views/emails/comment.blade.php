@component('mail::message')
# New Comment

<?php

var_dump($theExchange);
?>
<br><br>
<?php /*var_dump($this->theExchange->getRating());*/ ?>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
