<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 19</title>
</head>

<body>
  <h1>Pirámide</h1>
  <p>Mostramos los número entre el rango establecido de 7 en 7</p>
  <form action="index.php" method="post">
    <label for="base">Altura:</label>
    <input type="number" name="altura" id="base" required>
    <label for="base">Carácter para la pirámide:</label>
    <input type="number" name="relleno" id="base" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Realiza un programa que pinte una pirámide por pantalla. 
   * La altura se debe pedir por teclado mediante un formulario. 
   * La pirámide estará hecha de bolitas, ladrillos o cualquier otra 
   * imagen de las 5 que se deben dar a elegir mediante un formulario.
   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num1"]) || !is_numeric($_POST["num1"]) || !isset($_POST["num2"]) || !is_numeric($_POST["num2"])) {
    exit; // Salimos del programa
  }

  $num1 = $_POST["num1"]; // Guardamos el número introducido por el usuario
  $num2 = $_POST["num2"]; // Guardamos el número introducido por el usuario

  if ($num2 < $num1) {
    echo "<p>El segundo número debe ser mayor que el primero</p>"; // Mostramos un mensaje de error
  } else {
    for ($i = $num1; $i <= $num2; $i += 7) {
      echo "<p>$i</p>";
    }
  }





  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  ?>
</body>

</html>