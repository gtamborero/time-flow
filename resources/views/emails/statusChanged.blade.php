@component('mail::message')
# Introduction
<?php var_dump($exchange->amount); ?>min

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
