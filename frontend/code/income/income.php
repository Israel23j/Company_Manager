<?php

  $url = "http://backend/income";
  $data = json_decode(file_get_contents($url),true);

  $string = " <tr class='first'>
                <td>Número de pedido</td>
                <td>Cliente</td>
                <td>Fecha de expedición</td>
              </tr>";

  for ($i=0;$i<=count($data)-1;$i++){
      $string .=  "<tr><td>" . $data[$i]['id_order'] . 
                  "</td><td>" . $data[$i]['client'] . 
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
              <ul>
                <li class='income'><a href='./income.php'>Ingresos</a></li>
                <li><a href='../index.php'>Company Manager</a></li>
                <li><a href='../providers/providers.php'>Proveedores</a></li>
                <li><a href='../clients/clients.php'>Clientes</a></li>
                <li><a href='../products/products.php'>Productos</a></li>
                <li><a href='../expenses/expenses.php'>Gastos</a></li>
              </ul>
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