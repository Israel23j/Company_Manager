<?php
#$tabla = $_GET['name'];
$url = "http://backend/products";
$data = json_decode(file_get_contents($url),true);

$string = "";

for ($i=0;$i<=count($data)-1;$i++){
    $string .=  "Producto: " . $data[$i]['name'] . "<br>Código de producto: " . $data[$i]['code_product'] . "<br>Proveedor: " . $data[$i]['ID_provider'] ."<br>Precio sin IVA: " . $data[$i]['price_without_iva'] . "<br><br>";
}

echo $string;

?>