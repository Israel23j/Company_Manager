<?php

    $url = "http://backend/providers";
    $data = json_decode(file_get_contents($url),true);

    $string = " <tr class='first'>
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
        $string .=  "<tr><td>" . $data[$i]['id_provider'] . 
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
                    <ul>
                    <li class='providers'><a href='./providers.php'>Proveedores</a></li>
                    <li><a href='../index.php'>Company Manager</a></li>
                    <li><a href='../clients/clients.php'>Clientes</a></li>
                    <li><a href='../products/products.php'>Productos</a></li>
                    <li><a href='../expenses/expenses.php'>Gastos</a></li>
                    <li><a href='../income/income.php'>Ingresos</a></li>
                    </ul>
                </header>
                <form action='./add_provider.php'>
                    <input type='submit' value='Nuevo proveedor'>
                </form>
                <table>
                    $string
                </table>
            </body>
            </html>";

?>