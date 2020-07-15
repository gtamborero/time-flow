@component('mail::message')

  @if ($status === 0)
    # <center>@lang('New exchange')</center>
  @endif
  @if ($status === 1)
    # <center>@lang('Exchange Update')</center>
  @endif
  @if ($status === -1)
    # <center>@lang('Rejected Exchange')</center>
  @endif

@lang('Time-Flow is a Time Exchange System. You are receiving this mail because someone has send or requested time to you')

<table class="timeflow">
  <td style="background-color:#222; padding:8px; color:#fff; ">
    Exchange Concept:
  </td>
  <tr>
  <td>{{ $concept }}</td>
  <tr>
  <td>Amount: {{ $amount }}</td>
</table>

<br>

<table class="timeflow">
  <td style="border:1px solid #ddd; padding:8px;  color:#fff; background-color:
  @if ($status === -1) #f00 @endif
  @if ($status === 0) #008 @endif
  @if ($status === 1) #090 @endif
  ;">Exchange Status:
    @if ($status === -1) Rejected @endif
    @if ($status === 0) Pending @endif
    @if ($status === 1) Accepted @endif
  </td>
  <tr>
  <td >Time Receiver: {{ $sellerName }} - <a href="mailto:{{ $sellerMail }}">{{ $sellerMail }}</a></td>
  <tr>
  <td >Time Giver: {{ $buyerName }} - <a href="mailto:{{ $buyerMail }}">{{ $buyerMail }}</a></td>
</table>

<br>

@if ($rating)
  <table class="timeflow">
    <td style="background-color:#555; padding:8px; color:#fff; ">
      Comments of <span style="text-transform:capitalize;">{{ $buyerName }}</span>:
    <tr>
    <td> {{ $comment }}</td>
    <tr>
    <td>
      Rating of <span style="text-transform:capitalize;">{{ $buyerName }}</span>: {{ $rating }} stars
    </td>
  </table>
@endif

<br>Exchange Creator: {{ $creatorName }}

@component('mail::button', ['url' => env('APP_URL') . 'login'])
  @lang('Log to Time-Flow')
@endcomponent

<center>
  @lang('El equipo de')
 {{ config('app.name') }}
</center>
@endcomponent

<style>
.timeflow {width:100%; text-align:center; padding:0px; margin:0px;}
.timeflow td {background-color:#f3f3f3; padding:8px;}
</style>
