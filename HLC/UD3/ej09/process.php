<?php
  // Recogemos los datos del formulario
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];

  if ($a == 0) { // Si a es 0, no es una ecuación de segundo grado
    echo "No es una ecuación de segundo grado";
  } else { // Si no, calculamos las soluciones
    $discriminante = $b * $b - 4 * $a * $c; // Calculamos el discriminante

    if ($discriminante < 0) { // Si el discriminante es negativo, no tiene soluciones reales
      echo "La ecuación no tiene soluciones reales";
    } else { // Si no, calculamos las soluciones
      $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
      $x2 = (-$b - sqrt($discriminante)) / (2 * $a);

      // Mostramos las soluciones
      echo "x1 = $x1<br>";
      echo "x2 = $x2";
    }
  }


?>