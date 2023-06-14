<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menú de Navegación</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <ul>
    <li class="company-manager"><a href="./index.php">Company Manager</a></li>
    <li class="dropdown">
      <a href="./providers/providers.php" class="dropbtn">Proveedores</a>
      <div class="dropdown-content">
        <a href="./providers/providers.php">Cartera</a>
        <a href="./expenses/expenses.php">Pedidos</a>
        <a href="./expenses/new_order.php">Nuevo pedido</a>
        <a href='./expenses/new_order_row.php'>Añadir líneas de pedido</a>
        <a href="./providers/add_provider.php">Nuevo proveedor</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="./clients/clients.php" class="dropbtn">Clientes</a>
      <div class="dropdown-content">
        <a href="./clients/clients.php">Cartera</a>
        <a href="./income/income.php">Pedidos</a>
        <a href="./clients/add_client.php">Añadir cliente</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="./products/products.php" class="dropbtn">Productos</a>
      <div class="dropdown-content">
        <a href="./products/products.php">Listado</a>
        <a href="./products/add_product.php">Añadir producto</a>
      </div>
    </li>
    </ul>
    <section class="image">
      <img  src="logo.jpg" width="600px">
    </section>
    <footer class="footer">
        <h4>Administración de Sistemas Informáticos en Red</h4>
    </footer>
  </body>
</html>

