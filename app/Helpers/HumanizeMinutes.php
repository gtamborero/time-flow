<?php
function humanizeMinutes($minutes){
  if (date('H', mktime(0, $minutes)) <= 0) return date('i', mktime(0, $minutes));
  return date('H ', mktime(0, $minutes)) . __('hours') . ' ' . date('i ', mktime(0, $minutes)) . __('minutes');
}
