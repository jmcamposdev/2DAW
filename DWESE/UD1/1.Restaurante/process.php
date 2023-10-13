<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitado</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper comanda">
    <h1>Comanda:</h1>
    <?php
    if (isset($_POST["submit-button"])) { // Comprobamos que se ha enviado el formulario
      // Recogemos los datos del formulario
      $numMesa = getNumMesa();
      $nombreCamarero = getStringFromForm("nombreCamarero");
      $apellidosCamarero = getStringFromForm("apellidosCamarero");
      $primerPlato = getStringFromForm("primerPlato");
      $segundoPlato = getStringFromForm("segundoPlato");
      $bebida = getStringFromForm("bebida");
      $extras = getCheckboxFromForm("extras");

      // Mostramos los datos
      echo "<p class='bold'>Numero de mesa: <span>$numMesa</span></p>";
      echo "<p class='bold'>Nombre del camarero: <span>{$nombreCamarero} {$apellidosCamarero}</span></p>";
      echo "<p class='bold'>Primer plato: <span>$primerPlato</span></p>";
      echo "<p class='bold'>Segundo plato: <span>$segundoPlato</span></p>";
      echo "<p class='bold'>Bebida: <span>$bebida</span></p>";
      echo "<p class='bold'>Extras:</p>";
      // Mostramos los extras
      if (empty($extras)) { // Si no se ha seleccionado ningún extra
        echo "<p>No se han seleccionado extras</p>";
      } else { // Si se han seleccionado extras
        // Mostramos los extras en una lista
        echo "<ul>";
        foreach ($extras as $extra) { // Recorremos el array de extras
          echo "<li>{$extra}</li>";
        }
        echo "</ul>";
      }
    }

    /**
     * Obtiene el numero de mesa del formulario sanitizandolo y convirtiéndolo a entero
     * @return int Numero de mesa
     */
    function getNumMesa()
    {
      // Obtenemos el numero de mesa del formulario sanitizandolo y convirtiéndolo a entero
      $numMesa = (int) filter_input(INPUT_POST, "numMesa", FILTER_SANITIZE_NUMBER_INT);
      if (empty($numMesa)) { // Si el numero de mesa esta vacío
        $numMesa = "Error, el numero de mesa no es valido";
      }
      return $numMesa;
    }

    /**
     * Obtiene un string del formulario sanitizandolo
     * @param string $formName Nombre del campo del formulario
     * @return string String del formulario
     */
    function getStringFromForm($formName)
    {
      $string = filter_input(INPUT_POST, $formName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if (empty($string)) {
        $string = "Error, el campo esta vacío";
      }
      return $string;
    }

    function getCheckboxFromForm($formName)
    {
      $checkbox = null;
      if (isset($_POST[$formName])) {
        $checkbox = filter_input(INPUT_POST, $formName, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
      }
      return $checkbox;
    }
    ?>
  </div>
</body>

</html>