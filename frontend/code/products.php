<?php
$tabla = $_GET['name'];
$url = "http://backend/$tabla";
$data = json_decode(file_get_contents($url),true);
var_dump($data);

$string = "";

for ($i=1;$i<=count($data);$i++){
    $string .= "Producto: " . $data[123456]['name'] . "<br>Código de producto: " . $data[123456]['code_product'] . "<br>";
}

echo $string;

?>