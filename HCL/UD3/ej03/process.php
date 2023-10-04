<?php
  // Recogemos los datos del formulario
  $numeroSemana = $_POST['numeroSemana'];

  // Comprobamos el número de la semana y mostramos el día correspondiente
  switch ($numeroSemana) {
    case 1:
      echo "Lunes";
      break;
    case 2:
      echo "Martes";
      break;
    case 3:
      echo "Miércoles";
      break;
    case 4:
      echo "Jueves";
      break;
    case 5:
      echo "Viernes";
      break;
    case 6:
      echo "Sábado";
      break;
    case 7:
      echo "Domingo";
      break;
    default: // Si no se cumple ninguno de los casos anteriores
      echo "El número de la semana no es válido";
      break;
  }
?>