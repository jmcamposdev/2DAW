<?php
  // Inicializamos las variables
  $respuestaCorrecta1 = 2;
  $respuestaCorrecta2 = 2;
  $respuestaCorrecta3 = 1;
  $respuestaCorrecta4 = 1;
  $respuestaCorrecta5 = 2;
  $respuestaCorrecta6 = 3;
  $respuestaCorrecta7 = 1;
  $respuestaCorrecta8 = 2;
  $respuestaCorrecta9 = 1;
  $respuestaCorrecta10 = 3;

  // Recogemos los datos del formulario
  $pregunta1 = $_POST['pregunta1'];
  $pregunta2 = $_POST['pregunta2'];
  $pregunta3 = $_POST['pregunta3'];
  $pregunta4 = $_POST['pregunta4'];
  $pregunta5 = $_POST['pregunta5'];
  $pregunta6 = $_POST['pregunta6'];
  $pregunta7 = $_POST['pregunta7'];
  $pregunta8 = $_POST['pregunta8'];
  $pregunta9 = $_POST['pregunta9'];
  $pregunta10 = $_POST['pregunta10'];

  // Calculamos la nota
  $nota = 0;

  $nota += $pregunta1 == $respuestaCorrecta1 ? 1 : 0;
  $nota += $pregunta2 == $respuestaCorrecta2 ? 1 : 0;
  $nota += $pregunta3 == $respuestaCorrecta3 ? 1 : 0;
  $nota += $pregunta4 == $respuestaCorrecta4 ? 1 : 0;
  $nota += $pregunta5 == $respuestaCorrecta5 ? 1 : 0;
  $nota += $pregunta6 == $respuestaCorrecta6 ? 1 : 0;
  $nota += $pregunta7 == $respuestaCorrecta7 ? 1 : 0;
  $nota += $pregunta8 == $respuestaCorrecta8 ? 1 : 0;
  $nota += $pregunta9 == $respuestaCorrecta9 ? 1 : 0;
  $nota += $pregunta10 == $respuestaCorrecta10 ? 1 : 0;

  // Mostramos la nota
  echo "Nota: $nota<br>";
?>