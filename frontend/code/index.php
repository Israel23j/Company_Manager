<?php

    $url = "http://backend";
    $data = json_decode(file_get_contents($url),true);

    print_r($data);

?>