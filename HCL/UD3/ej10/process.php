<?php
  // Horóscopo
  $dia = $_POST['dia'];
  $mes = $_POST['mes'];
  $horoscopo = "";

  if (($dia >= 21 && $mes == 3) || ($dia <= 20 && $mes == 4)) {
    $horoscopo = "Aries";
  } else if (($dia >= 21 && $mes == 4) || ($dia <= 20 && $mes == 5)) {
    $horoscopo = "Tauro";
  } else if (($dia >= 21 && $mes == 5) || ($dia <= 21 && $mes == 6)) {
    $horoscopo = "Géminis";
  } else if (($dia >= 22 && $mes == 6) || ($dia <= 22 && $mes == 7)) {
    $horoscopo = "Cáncer";
  } else if (($dia >= 23 && $mes == 7) || ($dia <= 23 && $mes == 8)) {
    $horoscopo = "Leo";
  } else if (($dia >= 24 && $mes == 8) || ($dia <= 23 && $mes == 9)) {
    $horoscopo = "Virgo";
  } else if (($dia >= 24 && $mes == 9) || ($dia <= 23 && $mes == 10)) {
    $horoscopo = "Libra";
  } else if (($dia >= 24 && $mes == 10) || ($dia <= 22 && $mes == 11)) {
    $horoscopo = "Escorpio";
  } else if (($dia >= 23 && $mes == 11) || ($dia <= 21 && $mes == 12)) {
    $horoscopo = "Sagitario";
  } else if (($dia >= 22 && $mes == 12) || ($dia <= 20 && $mes == 1)) {
    $horoscopo = "Capricornio";
  } else if (($dia >= 21 && $mes == 1) || ($dia <= 19 && $mes == 2)) {
    $horoscopo = "Acuario";
  } else if (($dia >= 20 && $mes == 2) || ($dia <= 20 && $mes == 3)) {
    $horoscopo = "Piscis";
  } else {
    $horoscopo = "Fecha incorrecta";
  }

  echo "Tu horóscopo es $horoscopo";

?>