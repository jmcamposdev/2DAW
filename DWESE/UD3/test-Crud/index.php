<?php

// Conexión a la base de datos
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

// Comprobamos la conexión
if ($dwes->connect_errno != null) {
    echo "ERROR: $dwes->connect_error";
    exit(); // Deja de ejecutar la página
}

// Seleccionamos la base de datos
$dwes->select_db('dwes');

// Ejecutamos una consulta
$resultado = $dwes->query('SELECT nombre_corto, descripcion, pvp, familia FROM producto');

// Obtenemos el primer registro
$productos = $resultado->fetch_array();  // Obtenemos el primer registro

if ($productos != null) {
    echo "<table border='1'><tr><th>Nombre Corto</th><th>Descripción</th><th>PVP</th><th>Familia</th></tr>";
    while ($productos != null) {
        echo "<tr><td>$productos[0]</td><td>$productos[1]</td><td>$productos[2]</td><td>$productos[3]</td></tr>";
        $productos = $resultado->fetch_array();
    }
    echo "</table>";
} else {
    echo "No hay datos en la base de datos";
}

// Cerramos la conexión
$resultado->free(); // Liberamos la memoria
$dwes->close(); // Cerramos la conexión