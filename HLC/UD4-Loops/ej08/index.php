<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 8</title>
  <style>
    tr,
    td {
      border: 1px solid black;
      padding: 5px;
    }
  </style>
</head>

<body>
  <h1>Tabla de Multiplicar</h1>
  <table>
    <?php
    /*
      * Muestra la tabla de multiplicar de un número introducido por teclado. 
      * El resultado se debe mostrar en una tabla (<table> en HTML).
      */
    $num = 5;
    for ($i = 1; $i <= 10; $i++) {
      echo "<tr>
              <td>$num x $i =</td>
              <td>" . $num * $i . "</td>
            </tr>";
    }
    ?>
  </table>
</body>

</html>