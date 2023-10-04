<?php
  // Ecuación ax + b = 0
  // Recogemos los datos del formulario
  $a = $_POST['a'];
  $b = $_POST['b'];
  
  // Comprobamos que se han enviado los datos y que son numéricos
  if (isset($_POST['a']) && isset($_POST['b']) && is_numeric($a) && is_numeric($b)) {
      if ($a == 0) { // Si a es 0, la ecuación no tiene solución
        echo "La ecuación no tiene solución";
      } else { // Si a no es 0, la ecuación tiene solución
        $x = -$b / $a; // Calculamos la solución
        echo "La solución de la ecuación $a x + $b = 0 es: $x"; // Mostramos la solución
      }
  } else { // Si no se han enviado los datos
    echo "No se han enviado los datos";
  }

?>