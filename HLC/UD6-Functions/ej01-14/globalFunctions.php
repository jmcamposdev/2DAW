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



