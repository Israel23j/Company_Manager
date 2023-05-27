<?php
    $id_order = $_GET['id_order'];
    $url = "http://backend/income/details/$id_order";
    $data = json_decode(file_get_contents($url),true);

    $string = " <tr>
                    <td>Producto</td>
                    <td>Cantidad</td>
                    <td>Precion sin IVA</td>
                </tr>";

    for ($i=0;$i<=count($data)-1;$i++){
        $string .=  "<tr><td>" . $data[$i]['code_product'] . 
                    "</td><td>" . $data[$i]['quantity'] . 
                    "</td><td>" . $data[$i]['price_without_iva'] . 
                    "</td></tr>";
    }

    echo "<!DOCTYPE html>
    <html>
    <head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    </head>
    <body>
    <h1>Detalles del pedido: $id_order</h1>
    <table>
        $string
    </table>
    </body>
    </html>";
?>