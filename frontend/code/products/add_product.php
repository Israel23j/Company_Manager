<?php

    echo "  <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet' type='text/css' href='add_product.css'>
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
                <a href='products.php' class='dropbtn'>Productos</a>
                <div class='dropdown-content'>
                    <a href='products.php'>Listado</a>
                    <a href='add_product.php'>Añadir producto</a>
                </div>
            </li>
        </ul>
        <h1>Nuevo producto</h1>
        <form action='http://localhost:8080/products/insert' method='POST'>
            <label for='code_product'>Código de producto:</label>
            <input type='int' id='code_product' name='code_product' required>
            <br><br>
            <label for='id_provider'>Identificador de proveedor:</label>
            <input type='int' id='id_provider' name='id_provider' required>
            <br><br>
            <label for='name'>Nombre del producto:</label>
            <input type='text' id='name' name='name' required>
            <br><br>
            <label for='price'>Precio sin IVA:</label>
            <input type='number' step='0.10' id='price' name='price' required>
            <br><br>
            <input type='submit' value='Enviar'>
        </form>
    </body>
    </html>";


?>