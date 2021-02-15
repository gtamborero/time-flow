<?php
// Call to URL to process mail / push service / etc
function pushUrlMailwork(){
    $url = url('/mailwork'); //URL to push
    $ctx = stream_context_create(['https'=> ['timeout' => 1]]);
    file_get_contents($url,null,$ctx);
}
