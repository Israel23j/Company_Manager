<?php
// Datos que deseas enviar a la API
$data = array(
    'code_product' => 'providers',
    'id_provider' => 'John Doe',
    'name' => '123456789',
    'price' => 'Calle Principal 123',
    
);

// URL de la API
$url = 'http://backend/companies/insert';

// Inicializar cURL
$curl = curl_init($url);

// Establecer las opciones de cURL
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Realizar la solicitud y obtener la respuesta
$response = curl_exec($curl);

// Verificar si hubo errores en la solicitud
if ($response === false) {
    echo 'Error en la solicitud: ' . curl_error($curl);
}

// Cerrar la conexión cURL
curl_close($curl);

// Procesar la respuesta
echo 'Respuesta de la API: ' . $response;
?>
