<?php
$tabla = $_GET['name'];
$url = "http://backend/$tabla";
$data = json_decode(file_get_contents($url),true);

$string = "";
for ($i=1;$i<=count($data)-1;$i++){
    $string .= "id_cliente: " . $data[$i]['quantity'] . "<br>Date: " . $data[$i]['date'] . "<br>";
}

echo $string;

?>