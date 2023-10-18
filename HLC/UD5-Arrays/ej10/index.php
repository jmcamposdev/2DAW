<?php

// Array con los palos de la baraja española
$puntuacion = array(
  'as' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0,
  'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4
);

// Array con las figuras de la baraja española
$palo = array('oros', 'copas', 'bastos', 'espadas');

// Array con las figuras de la baraja española
$figura = array('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');

// VARIABLES
$cartasEchadas = [];
$contadorCartasEchadas = 0;
$puntosTotales = 0;

// Generamos las cartas
do {
  $paloCarta = $palo[rand(0, 3)]; // Generamos un palo aleatorio
  $figuraCarta = $figura[rand(0, 9)]; // Generamos una figura aleatoria
  $puntosCarta = $puntuacion[$figuraCarta]; // Obtenemos los puntos de la figura
  $nombreCarta = "$figuraCarta de $paloCarta"; // Nombre de la carta
  if (!in_array($nombreCarta, (array) $cartasEchadas)) { // Si la carta no está en el array de cartas echadas
    echo "$nombreCarta - $puntosCarta puntos<br>";
    array_push($cartasEchadas, $nombreCarta);
    $contadorCartasEchadas++;
    $puntosTotales += $puntosCarta;
  }
} while ($contadorCartasEchadas < 10);

echo "<br><b>Total: $puntosTotales puntos</b>";
