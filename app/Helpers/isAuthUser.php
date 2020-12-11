<?php
function isAuthUser($userName){
    if ($userName == Auth::user()->name)
    return 1;
}