<?php

    $url = "http://backend/clients";
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
                    <link rel='stylesheet' type='text/css' href='../styles.css'>
                </head>
                <body>
                    <ul>
                        <li class='company-manager'><a href='../index.php'>Company Manager</a></li>
                        <li class='dropdown'>
                            <a href='../providers/providers.php' class='dropbtn'>Proveedores</a>
                            <div class='dropdown-content'>
                                <a href='../providers/providers.php'>Cartera</a>
                                <a href='../expenses/expenses.php'>Pedidos</a>
                                <a href='../expenses/new_order.php'>Nuevo pedido</a>
                                <a href='../expenses/new_order_row.php'>Añadir líneas de pedido</a>
                                <a href='../providers/add_provider.php'>Nuevo proveedor</a>
                            </div>
                        </li>
                        <li class='dropdown'>
                            <a href='clients.php' class='dropbtn'>Clientes</a>
                            <div class='dropdown-content'>
                                <a href='clients.php'>Cartera</a>
                                <a href='../income/income.php'>Pedidos</a>
                                <a href='add_client.php'>Nuevo cliente</a>
                            </div>
                        </li>
                        <li class='dropdown'>
                            <a href='../products/products.php' class='dropbtn'>Productos</a>
                            <div class='dropdown-content'>
                                <a href='../products/products.php'>Listado</a>
                                <a href='../products/add_product.php'>Añadir producto</a>
                            </div>
                        </li>
                    </ul>
                    <table>
                        $string
                    </table>
                </body>
            </html>";

?>