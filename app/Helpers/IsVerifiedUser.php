<?php
function isVerifiedUser(){
    return (Auth::user()) && (Auth::user()->hasVerifiedEmail());
}
