@component('mail::message')
<center>Control de tareas <br></center><br>

@component('mail::panel')
<strong>Tarea:</strong> {{$exchange}}<br>


  <strong>Descripción:</strong><br>

<strong>Estado:</strong>

  <br>
  @if (1)
    <strong>Duración:</strong> h  <br>
  @endif

<strong>Fecha y hora:</strong>
@endcomponent

@component('mail::button', ['url' => url('s365') . "/"])
PANEL SEGUIMIENTO 365
@endcomponent

Saludos,<br>
El equipo de iProject
@endcomponent
