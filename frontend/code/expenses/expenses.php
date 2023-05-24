<?php

  $url = "http://backend/expenses";
  $data = json_decode(file_get_contents($url),true);

  $string = " <tr>
                <td>Número de pedido</td>
                <td>Proveedor</td>
                <td>Fecha de expedición</td>
              </tr>";

  for ($i=0;$i<=count($data)-1;$i++){
      $string .=  "<tr><td>" . $data[$i]['id_order'] . 
                  "</td><td>" . $data[$i]['id_provider'] . 
                  "</td><td>" . $data[$i]['date'] . 
                  "</td></tr>";
  }

  echo "<!DOCTYPE html>
        <html>
        <head>
          <link rel='stylesheet' type='text/css' href='styles.css'>
        </head>
        <body>
        <header>
          <h1>Pedidos a proveedores</h1>
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