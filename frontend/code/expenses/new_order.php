<?php

echo "<!DOCTYPE html>
<html>
  <head>
  <link rel='stylesheet' type='text/css' href='new_order.css'>
    <link rel='stylesheet' type='text/css' href='../styles.css'>
  </head>
  <body>
    <ul>
      <li class='company-manager'><a href='../index.php'>Company Manager</a></li>
      <li class='dropdown'>
          <a href='../providers/providers.php' class='dropbtn'>Proveedores</a>
          <div class='dropdown-content'>
              <a href='../providers/providers.php'>Cartera</a>
              <a href='expenses.php'>Pedidos</a>
              <a href='new_order.php'>Nuevo pedido</a>
              <a href='new_order_row.php'>Añadir líneas de pedido</a>
              <a href='../providers/add_provider.php'>Nuevo proveedor</a>
          </div>
      </li>
      <li class='dropdown'>
          <a href='../clients/clients.php' class='dropbtn'>Clientes</a>
          <div class='dropdown-content'>
              <a href='../clients/clients.php'>Cartera</a>
              <a href='../income/income.php'>Pedidos</a>
              <a href='../clients/add_client.php'>Añadir cliente</a>
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
    <h1>Nuevo pedido</h1>
    <form action='http://localhost:8080/orders/new_order' method='POST'>
        <label for='id_provider'>Identificador del proveedor:</label>
        <input type='int' id='id_provider' name='id_provider' required>
        <br><br>
        <label for='date'>Fecha de expedición:</label>
        <input type='text' id='date' name='date' placeholder='AAAA-MM-DD'required>
        <br><br>
        <input type='submit' value='Enviar'>
    </form>
  </body>
</html>";

?>
