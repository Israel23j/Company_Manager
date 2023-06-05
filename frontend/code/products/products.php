<?php

  $url = "http://backend/products";
  $data = json_decode(file_get_contents($url),true);

  $string = " <tr class='first'>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Proveedor</td>
                  <td>Precio sin IVA</td>
              </tr>";

  for ($i=0;$i<=count($data)-1;$i++){
      $string .=  "<tr><td>" . $data[$i]['code_product'] . 
                  "</td><td>" . $data[$i]['name'] . 
                  "</td><td>" . $data[$i]['provider'] .
                  "</td><td>" . $data[$i]['price_without_iva'] . 
                  "</td></tr>";
  }

  echo "<!DOCTYPE html>
        <html>
          <head>
            <link rel='stylesheet' type='text/css' href='styles.css'>
          </head>
          <body>
            <header>
              <ul>
                <li class='products'><a href='./products.php'>Productos</a></li>
                <li><a href='../index.php'>Company Manager</a></li>
                <li><a href='../providers/providers.php'>Proveedores</a></li>
                <li><a href='../clients/clients.php'>Clientes</a></li>
                <li><a href='../expenses/expenses.php'>Gastos</a></li>
                <li><a href='../income/income.php'>Ingresos</a></li>
              </ul>
            </header>
            <table>
              $string
            </table>
          </body>
        </html>";

?>