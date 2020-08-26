<?php
function humanizeMinutes($minutes){
    return date('H', mktime(0, $minutes)) . ':' . date('i ', mktime(0, $minutes)) . __('min');
}
