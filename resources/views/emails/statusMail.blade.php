@component('mail::message')

# <center>{{ $customMessage }}</center>

<center>{{ $customMessageBody }}
</center>

<br>
<table class="timeflow">
  <td style="background-color:#222; padding:8px; color:#fff; ">
    @lang('Concept'):
  </td>
  <tr>
  <td>{{ $concept }}</td>
  <tr>
  <td>@lang('Amount'): {{ humanizeMinutes($amount) }}</td>
</table>

<br>

@if ($rating)
  <table class="timeflow">
    <td style="background-color:#555; padding:8px; color:#fff; ">
      @lang('Comment of') <span style="text-transform:capitalize;">{{ $buyerName }}</span>:
    <tr>
    <td> {{ $comment }}</td>
    <tr>
    <td>
      @lang('Rating of') <span style="text-transform:capitalize;">{{ $buyerName }}</span>: {{ $rating }} @lang('stars')
    </td>
  </table>
<br>
@endif

<table class="timeflow">
  <td style="border:1px solid #ddd; padding:8px;  color:#fff; background-color:
  @if ($status === -1) #f00 @endif
  @if ($status === 0) #008 @endif
  @if ($status === 1) #090 @endif
  ;">@lang('Status'):
    @if ($status === -1) @lang('Rejected') @endif
    @if ($status === 0) @lang('Pending') @endif
    @if ($status === 1) @lang('Accepted') @endif
  </td>
  <tr>
  <td >@lang('Time Giver'):<br> {{ $buyerName }} - <a href="mailto:{{ $buyerMail }}">{{ $buyerMail }}</a></td>
  <tr>
  <td >@lang('Time Receiver'):<br> {{ $sellerName }} - <a href="mailto:{{ $sellerMail }}">{{ $sellerMail }}</a></td>
</table>

@component('mail::button', ['url' => 'https://time-flow.app/login'])
  @lang('Go to Time-Flow')
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
