<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>
</head>
<body>
  <form action="add.php">
    
  </form>
</body>
</html>
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