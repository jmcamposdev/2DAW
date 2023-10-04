<?php
  // Inicializamos las variables
  $gravedad = 9.8;

  // Recogemos los datos del formulario
  $altura = $_POST['altura'];

  // Calculamos el tiempo
  if ($altura < 0) { // Si la altura es negativa, mostramos un mensaje de error
    echo "La altura no puede ser negativa";
  } else {
    $tiempo = sqrt(2 * $altura / $gravedad);
    echo "El tiempo que tarda en caer el objeto es: $tiempo";
  }

?>