<?php

    echo "  <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet' type='text/css' href='add_client.css'>
        <link rel='stylesheet' type='text/css' href='../styles.css'>
    </head>
    <body>
        <ul>
            <li class='company-manager'><a href='../index.php'>Company Manager</a></li>
            <li class='dropdown'>
                <a href='../providers/providers.php' class='dropbtn'>Proveedores</a>
                <div class='dropdown-content'>
                    <a href='../providers/providers.php'>Cartera</a>
                    <a href='../expenses/expenses.php'>Pedidos</a>
                    <a href='../expenses/new_order.php'>Nuevo pedido</a>
                    <a href='../expenses/new_order_row.php'>Añadir líneas de pedido</a>
                    <a href='../providers/add_provider.php'>Nuevo proveedor</a>
                </div>
            </li>
            <li class='dropdown'>
                <a href='clients.php' class='dropbtn'>Clientes</a>
                <div class='dropdown-content'>
                    <a href='clients.php'>Cartera</a>
                    <a href='../income/income.php'>Pedidos</a>
                    <a href='add_client.php'>Añadir cliente</a>
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
        <h1>Nuevo cliente</h1>
        <form action='http://localhost:8080/companies/insert' method='POST'>
            <label for='type'>Tipo:</label>
            <select id='tb_name' name='tb_name'>
                <option value='clients'>Cliente</option>
            </select>
            <br><br>
            <label for='name'>Nombre:</label>
            <input type='text' id='name' name='name' required>
            <br><br>
            <label for='cif'>CIF:</label>
            <input type='text' id='cif' name='cif' required>
            <br><br>
            <label for='direction'>Dirección:</label>
            <input type='text' id='direction' name='direction' required>
            <br><br>
            <label for='phone'>Teléfono:</label>
            <input type='int' id='phone' name='phone' required>
            <br><br>
            <label for='email'>Correo electrónico:</label>
            <input type='text' id='email' name='email' required>
            <br><br>
            <label for='contact'>Contacto:</label>
            <input type='text' id='contact' name='contact' required>
            <br><br>
            <label for='schedule'>Horario:</label>
            <input type='text' id='schedule' name='schedule' required>
            <br><br>
            <input type='submit' value='Enviar'>
        </form>
    </body>
    </html>";


?>