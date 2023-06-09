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
        <a href="./providers/add_provider.php">Nuevo proveedor</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="./clients/clients.php" class="dropbtn">Clientes</a>
      <div class="dropdown-content">
        <a href="./clients/clients.php">Cartera</a>
        <a href="./income/income.php">Pedidos</a>
        <a href="./clients/add_provider.php">Añadir cliente</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="./products/products.php" class="dropbtn">Productos</a>
      <div class="dropdown-content">
        <a href="./products/products.php">Listado</a>
        <a href="./products/add_provider.php">Añadir producto</a>
      </div>
    </li>
  </ul>
</body>
</html>

