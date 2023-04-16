<?php

    #echo "Hola como estas Isra, todo bine?";

    $url = "http://localhost:8080";
    #$url = "https://pokeapi.co/api/v2/pokemon/ditto";
    $data = json_decode(file_get_contents($url),true);
    #$data_json = json_decode($data, true);

    #print_r($data_json);
    echo $data['message'];

?>