<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menú de Navegación</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <ul>
    <li><a href="providers.php">Proveedores</a></li>
    <li><a href="clients.php">Clientes</a></li>
    <li><a href="products.php">Productos</a></li>
    <li><a href="orders.php">Pedidos</a></li>
  </ul>
</body>
</html>


<?php

echo "<!DOCTYPE html>
<html>
   <head>
    <title>Pagina</title>
   </head>
   <body>
    <form action='products.php' method=get>
        <input type='text' id='name' name='name'>
        <input type=button value='Enviar'>
   </body>
</html>"

?>