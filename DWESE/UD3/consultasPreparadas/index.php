<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas Preparadas</title>
  <style>
    form {
      max-width: 700px;
      margin: 0 auto;
      margin-bottom: 200px;
    }

    table {
      border-collapse: collapse;
      max-width: 700px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <form action="index.php" method="post">
    <h3>Rango de Precios</h3>
    <label for="min">Precio Mínimo</label>
    <input type="number" name="min" id="min" min="0" step="0.01" required>
    <label for="max">Precio Máximo</label>
    <input type="number" name="max" id="max" min="0" step="0.01" required>
    <input type="submit" value="Buscar">
  </form>
</body>

</html>
<?php

// Comprobamos que se han recibido los datos 
if (!isset($_POST['min']) || !isset($_POST['max']) || $_POST['min'] == '' || $_POST['max'] == '') {
  exit();
} else if ($_POST['min'] > $_POST['max']) {
  echo "El precio mínimo no puede ser mayor que el precio máximo";
  exit();
}

// Conexión a la base de datos
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
// Comprobamos la conexión
if ($dwes->connect_errno != null) {
  echo "ERROR: $dwes->connect_error";
  exit(); // Deja de ejecutar la página
}

// Seleccionamos la base de datos
$dwes->select_db('dwes');

// Preparamos la consulta
$consulta = $dwes->prepare('SELECT nombre_corto, descripcion, pvp, familia FROM producto WHERE pvp BETWEEN ? AND ?');
// Asociamos los parámetros a la consulta con dos letras 'd' (double)
$consulta->bind_param('dd', $_POST['min'], $_POST['max']);
// Ejecutamos la consulta
$consulta->execute();
// Obtenemos el resultado
$resultado = $consulta->get_result();

// Obtenemos el primer registro
$productos = $resultado->fetch_array();

// Si hay datos, mostramos la tabla
if ($productos != null) {
  // Mostramos la cabecera de la tabla
  echo "<table border='1'><tr><th>Nombre Corto</th><th>Descripción</th><th>PVP</th><th>Familia</th></tr>";
  while ($productos != null) {
    // Mostramos los datos de cada fila
    echo "<tr><td>$productos[0]</td><td>$productos[1]</td><td>$productos[2]</td><td>$productos[3]</td></tr>";
    $productos = $resultado->fetch_array();
  }
  // Cerramos la tabla
  echo "</table>";
} else { // Si no hay datos, mostramos un mensaje
  echo "No hay datos en la base de datos";
}

// Cerramos la conexión
$resultado->free(); // Liberamos la memoria
$dwes->close(); // Cerramos la conexión