<?php
#$tabla = $_GET['name'];
$url = "http://backend/providers";
$data = json_decode(file_get_contents($url),true);

$string = "";

for ($i=0;$i<=count($data)-1;$i++){
    $string .=  "Proveedor: " . $data[$i]['name'] . 
    "<br>Identificador de proveedor: " . $data[$i]['id_provider'] . 
    "<br>CIF: " . $data[$i]['cif'] . 
    "<br>Direción: " . $data[$i]['direction'] .
    "<br>Teléfono: " . $data[$i]['phone'] . 
    "<br>Email: " . $data[$i]['email'] . 
    "<br>Contacto: " . $data[$i]['contact'] . 
    "<br>Horario de atención: " . $data[$i]['schedule'] .
    "<br><br>";
}

echo $string;

?>