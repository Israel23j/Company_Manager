<?php

  $url = "http://backend/products";
  $data = json_decode(file_get_contents($url),true);

  $string = " <tr>
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
          <h1>Productos</h1>
        </header>
          <form id='myForm' action='details.php' method='get'>
              <label>Detalles del pedido: </label>
              <input type='number' name='id_order'>
              <input type='submit' value='Acceder'>
          </form>
          <table>
            $string
          </table>
        </body>
        </html>";

?>