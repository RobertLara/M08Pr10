<?php

require './Curl.php';
    
$url = "https://api.github.com/user/repos";

echo $curl->get($url);

?>