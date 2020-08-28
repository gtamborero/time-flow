<?php
function humanizeMinutes($minutes){
    if (date('H', mktime(0, $minutes)) == 0) return date('i', mktime(0, $minutes)) . __('min');
    return date('H', mktime(0, $minutes)) . ':' . date('i', mktime(0, $minutes)) . __('h');
}
