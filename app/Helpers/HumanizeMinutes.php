<?php
function humanizeMinutes($minutes){
  if (date('H', mktime(0, $minutes)) <= 0) return date('i ', mktime(0, $minutes)) . __('minutes');
  if (date('i', mktime(0, $minutes)) == 0) return date('H ', mktime(0, $minutes)) . __('hours');
  if (date('H', mktime(0, $minutes)) == 1)
    return date('H ', mktime(0, $minutes)) . __('hour') . ', ' . date('i ', mktime(0, $minutes)) . __('minutes');
    return date('H ', mktime(0, $minutes)) . __('hours') . ', ' . date('i ', mktime(0, $minutes)) . __('minutes');
}
