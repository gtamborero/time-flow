<?php
function isUserAuthUser($userName){
    if ($userName == Auth::user()->name)
    return 1;
}