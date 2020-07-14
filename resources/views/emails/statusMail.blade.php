@component('mail::message')
# @lang('Titulo mail')

{{ $sellerName }}
{{ $sellerMail }}
{{ $buyerName }}
{{ $buyerMail }}
{{ $creatorName }}

{{ $status }}
{{ $concept }}
{{ $amount }}
{{ $accepted_time }}
{{ $finished_time }}
{{ $cancelled_time }}

{{ $rating }}
{{ $comment }}

@component('mail::button', ['url' => ''])
  @lang('Entrar a Time-Flow')
@endcomponent

<center>
  @lang('El equipo de') 
{{ config('app.name') }}
</center>
@endcomponent
