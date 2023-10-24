<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajedrez</title>
</head>
<body>
  <form action="index.php" method="POST">
    <label for="fila">Fila</label>
    <input type="number" name="fila" id="fila">
    <label for="columna">Columna</label>
    <input type="text" name="columna" id="columna">
    <input type="submit" value="Enviar"/>
  </form>
</body>
</html>
<?php

/**
 * Escribe un programa que, dada una posición en un tablero de ajedrez, 
 * nos diga a qué casillas podría saltar un alfil que se encuentra en esa posición. 
 * Indícalo de forma gráfica sobre el tablero con un color diferente para estas casillas 
 * donde puede saltar la figura. El alfil se mueve siempre en diagonal.
 * El tablero cuenta con 64 casillas. 
 * Las columnas se indican con las letras de la “a” a la “h” y 
 * las filas se indican del 1 al 8.
 */

// Comprobamos que se han enviado los datos
if (isset($_POST['fila']) && isset($_POST['columna'])) {
  // Recogemos los datos
  $fila = $_POST['fila'];
  $columna = $_POST['columna'];

  // Comprobamos que los datos son correctos
  if ($fila < 1 || $fila > 8) {
    echo "<h1>La fila debe estar entre 1 y 8</h1>";
    return;
  }

  if ($columna < 'a' || $columna > 'h') {
    echo "<h1>La columna debe estar entre a y h</h1>";
    return;
  }

  // Mostramos la posición
  echo "<h1>Posición: $fila$columna</h1>";

  // Creamos el tablero
  $tablero = array(
    array('a8', 'b8', 'c8', 'd8', 'e8', 'f8', 'g8', 'h8'),
    array('a7', 'b7', 'c7', 'd7', 'e7', 'f7', 'g7', 'h7'),
    array('a6', 'b6', 'c6', 'd6', 'e6', 'f6', 'g6', 'h6'),
    array('a5', 'b5', 'c5', 'd5', 'e5', 'f5', 'g5', 'h5'),
    array('a4', 'b4', 'c4', 'd4', 'e4', 'f4', 'g4', 'h4'),
    array('a3', 'b3', 'c3', 'd3', 'e3', 'f3', 'g3', 'h3'),
    array('a2', 'b2', 'c2', 'd2', 'e2', 'f2', 'g2', 'h2'),
    array('a1', 'b1', 'c1', 'd1', 'e1', 'f1', 'g1', 'h1')
  );
  // Buscamos la posición en el tablero
  $posicion = null;
  for ($i=0; $i < count($tablero); $i++) { 
    for ($j=0; $j < count($tablero[$i]); $j++) { 
      if ($tablero[$i][$j] == $columna.$fila) { // Si la posición coincide
        $posicion = array($i, $j); // Guardamos la posición
      }
    }
  }


  // Mostramos el tablero
  echo "<table border='1'>";
  for ($i=0; $i < count($tablero); $i++) { 
    echo "<tr>";
    for ($j=0; $j < count($tablero[$i]); $j++) { 
      if ($i == $posicion[0] && $j == $posicion[1]) { // Si la posición coincide con la del alfil la pintamos de rojo
        echo "<td style='background-color: red'>".$tablero[$i][$j]."</td>";
      } else if (abs($i - $posicion[0]) == abs($j - $posicion[1])) { 
        echo "<td style='background-color: green'>".$tablero[$i][$j]."</td>";
      } else {
        echo "<td>".$tablero[$i][$j]."</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
}

?>