<?php

/**
 * Comprueba si un número es capicúa
 * @param int $number Número a comprobar
 * @return bool True si es capicúa, false si no
 */
function esCapicua(int $number) {
  $reverseNumber = strrev($number);
  return $number == $reverseNumber;
}

/**
 * Comprueba si un número es primo
 * @param int $number Número a comprobar
 * @return bool True si es primo, false si no
 */
function esPrimo(int $number) {
  // Inicializamos la variable a true
  $esPrimo = true;
  // Recorremos todos los números desde el 2 hasta el número anterior
  for ($i=2; $i < $number && $esPrimo; $i++) { 
    // Si el resto de dividir el número entre el contador es 0, no es primo
    if ($number % $i === 0) {
      $esPrimo = false;
    }
  }
  // Devolvemos true o false según si es primo o no
  return $esPrimo;
}

/**
 * Devuelve el siguiente número primo
 * @param int $number Número a partir del cual buscar el siguiente primo
 * @return int Siguiente número primo
 */
function siguientePrimo(int $number) {
  // Sumamos uno al número y comprobamos si es primo
  $nextPrime = $number + 1;
  // Mientras no sea primo, sumamos uno
  while (!esPrimo($nextPrime)) {
    $nextPrime++; // Sumamos uno
  }
  // Devolvemos el siguiente primo
  return $nextPrime;
}

