<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 05</title>
</head>

<body>
  <h1>Diagrama</h1>
  <?php
  /**
   * Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado año 
   * y que muestre a continuación un diagrama de barras horizontales con esos datos. 
   * Las barras del diagrama se pueden dibujar a base de la concatenación de una imagen.
   */

  // VARIABLES
  define("MESES", ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"]);
  $formularioEnviado = isset($_POST['temperatura']);
  $temperaturas = [];

  // Recogemos los datos del formulario si se han introducido
  if ($formularioEnviado) {
    $temperaturas = $_POST['temperatura'];

    // Mostramos el diagrama
    for ($i=0; $i < count($temperaturas); $i++) { 
      echo MESES[$i], ": ";
      for ($j=0; $j < $temperaturas[$i]; $j++) { 
        echo "▓";
      }
      echo "<br>";
    }


  }

  // Mostramos el formulario sino se ha introducido el número
  if (!$formularioEnviado) {
    echo "<p> Introduzca la temperatura media de cada mes: </p>";
    echo "<form action='index.php' method='POST'>";
    foreach (MESES as $mes) {
      echo $mes, ": <input type='number' name='temperatura[]' min='0' max='50' required> <br>";
    }
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";
  }

  ?>
</body>

</html>