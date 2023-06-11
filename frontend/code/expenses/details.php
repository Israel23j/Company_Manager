<?php
$id_order = $_GET['id_order'];
$url = "http://backend/expenses/details/$id_order";
$data = json_decode(file_get_contents($url),true);

$string = "<tr class='first'>
            <td>Producto</td>
            <td>Cantidad</td>
            <td>Precion sin IVA</td>
          </tr>";

for ($i=0;$i<count($data)-1;$i++){
    $string .=  "<tr><td>" . $data[$i]['code_product'] . 
                "</td><td>" . $data[$i]['quantity'] . 
                "</td><td>" . $data[$i]['price_without_iva'] . 
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
            <h1>Pedido número $id_order</h1>
            <table>
            $string
          </table>
        </body>
      </html>";

?>