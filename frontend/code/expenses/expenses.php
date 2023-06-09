<?php

  $url = "http://backend/expenses";
  $data = json_decode(file_get_contents($url),true);

  $string = " <tr class='first'>
                <td>Número de pedido</td>
                <td>Proveedor</td>
                <td>Fecha de expedición</td>
              </tr>";

  for ($i=0;$i<=count($data)-1;$i++){
      $string .=  "<tr><td>" . $data[$i]['id_order'] . 
                  "</td><td>" . $data[$i]['provider'] . 
                  "</td><td>" . $data[$i]['date'] . 
                  "</td></tr>";
  }

  echo "<!DOCTYPE html>
        <html>
          <head>
            <link rel='stylesheet' type='text/css' href='../styles.css'>
          </head>
          <body>
            <ul>
              <li class='company-manager'><a href='../index.php'>Company Manager</a></li>
              <li class='dropdown'>
                  <a href='./providers/providers.php' class='dropbtn'>Proveedores</a>
                  <div class='dropdown-content'>
                      <a href='providers.php'>Cartera</a>
                      <a href='../expenses/expenses.php'>Pedidos</a>
                      <a href='../expenses/new_order.php'>Nuevo pedido</a>
                      <a href='./providers/add_provider.php'>Nuevo proveedor</a>
                  </div>
              </li>
              <li class='dropdown'>
                  <a href='../clients/clients.php' class='dropbtn'>Clientes</a>
                  <div class='dropdown-content'>
                      <a href='../clients/clients.php'>Cartera</a>
                      <a href='../income/income.php'>Pedidos</a>
                      <a href='../clients/add_provider.php'>Añadir cliente</a>
                  </div>
              </li>
              <li class='dropdown'>
                  <a href='../products/products.php' class='dropbtn'>Productos</a>
                  <div class='dropdown-content'>
                      <a href='../products/products.php'>Listado</a>
                      <a href='../products/add_provider.php'>Añadir producto</a>
                  </div>
              </li>
            </ul>
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