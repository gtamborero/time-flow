<?php
function humanizeMinutes($minutes){
  $sign = sign($minutes);
  $minutes = abs($minutes);
    if (date('H', mktime(0, $minutes)) == 0) return $sign . date('i', mktime(0, $minutes)) . __('min');
    return $sign . date('H', mktime(0, $minutes)) . ':' . date('i', mktime(0, $minutes)) . __('h');
}

function sign($number) {
  if ($number < 0) return "-";
}
