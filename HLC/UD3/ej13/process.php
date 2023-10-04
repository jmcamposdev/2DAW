<?php
  $numero1 = $_POST['numero1'];
  $numero2 = $_POST['numero2'];
  $numero3 = $_POST['numero3'];

  // Ordenar los números
  if ($numero1 > $numero2) {
    $aux = $numero1;
    $numero1 = $numero2;
    $numero2 = $aux;
  }
  if ($numero2 > $numero3) {
    $aux = $numero2;
    $numero2 = $numero3;
    $numero3 = $aux;
  }
  if ($numero1 > $numero2) {
    $aux = $numero1;
    $numero1 = $numero2;
    $numero2 = $aux;
  }

  echo "Los números ordenados son $numero1, $numero2 y $numero3";
?>