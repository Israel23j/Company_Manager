<?php

    $url = "http://backend/clients";
    $data = json_decode(file_get_contents($url),true);

    $string = " <tr>
                    <td>Identificador</td>
                    <td>Nombre</td>
                    <td>CIF</td>
                    <td>Dirección</td>
                    <td>Teléfono</td>
                    <td>Email</td>
                    <td>Contacto</td>
                    <td>Horario</td>
                </tr>";

    for ($i=0;$i<=count($data)-1;$i++){
        $string .=  "<tr><td>" . $data[$i]['id_client'] . 
                    "</td><td>" . $data[$i]['name'] . 
                    "</td><td>" . $data[$i]['cif'] . 
                    "</td><td>" . $data[$i]['direction'] .
                    "</td><td>" . $data[$i]['phone'] . 
                    "</td><td>" . $data[$i]['email'] . 
                    "</td><td>" . $data[$i]['contact'] . 
                    "</td><td>" . $data[$i]['schedule'] .
                    "</td></tr>";
    }

    echo "  <!DOCTYPE html>
            <html>
            <head>
            <link rel='stylesheet' type='text/css' href='styles.css'>
            </head>
            <body>
            <header>
                <h1>Clientes</h1>
            </header>
            <table>
                $string
            </table>
            </body>
            </html>";

?>