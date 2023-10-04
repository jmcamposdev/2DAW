<?php
  // Obtenemos los datos del formulario y lo transformamos a minúsculas
  $diaSemana = strtolower($_POST['diaSemana']);

  switch($diaSemana) {
    case 'lunes':
      echo "El $diaSemana nos toca DIWEB";
      break;
    case 'martes':
      echo "El $diaSemana nos toca DAWEB";
      break;
    case 'miércoles':
      echo "El $diaSemana nos toca DWESE";
      break;
    case 'jueves':
      echo "El $diaSemana nos toca DIWEB";
      break;
    case 'viernes':
      echo "El $diaSemana nos toca DAWEB";
      break;
    case 'sábado':
      echo "El $diaSemana es un día festivo";
      break;
    case 'domingo':
      echo "El $diaSemana es un día festivo";
      break;
    default:
      echo "El día introducido no es correcto";
  }
?>