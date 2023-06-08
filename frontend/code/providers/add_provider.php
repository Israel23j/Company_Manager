<?php

    echo "  <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet' type='text/css' href='add_provider.css'>
    </head>
    <body>
        <header>
            <h1>Nuevo proveedor</h1>
        </header>
        <form action='http://localhost:8080/companies/insert' method='POST'>
            <label for='type'>Tipo:</label>
            <select id='tb_name' name='tb_name'>
                <option value='providers'>Proveedor</option>
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