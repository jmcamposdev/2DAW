<?php
  // Recogemos los datos del formulario
  $numero1 = $_POST['numero1'];
  
  // Es divisible entre 2
  if ($numero1 % 2 == 0) {
    echo "El número $numero1 es divisible entre 2";
  } else {
    echo "El número $numero1 no es divisible entre 2";
  }

  echo "<br>"; // Salto de línea
  
  // Es divisible entre 5
  if ($numero1 % 5 == 0) {
    echo "El número $numero1 es divisible entre 5";
  } else {
    echo "El número $numero1 no es divisible entre 5";
  }
?>