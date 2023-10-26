<?php

/**
 * Comprueba si un número es capicúa
 * @param int $number Número a comprobar
 * @return bool True si es capicúa, false si no
 */
function esCapicua(int $number): bool
{
  $reverseNumber = strrev($number);
  return $number == $reverseNumber;
}

/**
 * Comprueba si un número es primo
 * @param int $number Número a comprobar
 * @return bool True si es primo, false si no
 */
function esPrimo(int $number): bool
{
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
function siguientePrimo(int $number): int
{
  // Sumamos uno al número y comprobamos si es primo
  $nextPrime = $number + 1;
  // Mientras no sea primo, sumamos uno
  while (!esPrimo($nextPrime)) {
    $nextPrime++; // Sumamos uno
  }
  // Devolvemos el siguiente primo
  return $nextPrime;
}

/**
 * Devuelve la potencia de un número
 * @param int $number Número a elevar
 * @param int $power Potencia a la que elevar
 * @return int Resultado de la potencia
 */
function potencia(int $number, int $power): int
{
  return $number ** $power;
}

/**
 * Devuelve el número de dígitos de un número
 * @param int $number Número a comprobar
 * @return int Número de dígitos
 */
function digitos(int $number): int
{
  return strlen(strval($number));
}

/**
 * Voltea un número
 * @param int $number Número a voltear
 * @return int Número volteado
 */
function voltea(int $number): int
{
  return strrev($number);
}

/**
 * Devuelve el dígito que está en la posición n de un número entero. Se empieza contando por el 0 y de izquierda a derecha
 * @param int $number Número a comprobar
 * @param int $position Posición del dígito a devolver
 * @return int Dígito en la posición indicada
 */
function digitoN(int $number, int $position): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Devolvemos el dígito en la posición indicada
  return $numberString[$position];
}

/**
 * Devuelve la posición de la primera ocurrencia de un dígito dentro de un número entero. Si no se encuentra, devuelve -1
 * @param int $number Número a comprobar
 * @param int $digit Dígito a buscar
 * @return int Posición del dígito en el número
 */
function posicionDeDigito(int $number, int $digit): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Buscamos la posición del dígito
  $position = strpos($numberString, strval($digit));
  // Si no se encuentra, devolvemos -1
  if ($position === false) {
    $position = -1;
  }
  // Devolvemos la posición
  return $position;
}

/**
 * Le quita a un número n dígitos por detrás (por la derecha)
 * @param int $number Número a comprobar
 * @param int $digits Número de dígitos a quitar
 * @return int Número sin los dígitos por detrás
 */
function quitarPorDetras(int $number, int $digits): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Quitamos los dígitos por detrás
  $numberString = substr($numberString, 0, -$digits);
  // Devolvemos el número
  return intval($numberString);
}

/**
 * Le quita a un número n dígitos por delante (por la izquierda)
 * @param int $number Número a comprobar
 * @param int $digits Número de dígitos a quitar
 * @return int Número sin los dígitos por delante
 */
function quitarPorDelante(int $number, int $digits): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Quitamos los dígitos por detrás
  $numberString = substr($numberString, $digits);
  // Devolvemos el número
  return intval($numberString);
}

/**
 * Añade un dígito a un número por detrás
 * @param int $number Número a comprobar
 * @param int $digit Dígito a añadir
 * @return int Número con el dígito añadido
 */
function pegarPorDetras(int $number, int $digit): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Añadimos el dígito por detrás
  $numberString .= strval($digit);
  // Devolvemos el número
  return intval($numberString);
}

/**
 * Añade un dígito a un número por delante
 * @param int $number Número a comprobar
 * @param int $digit Dígito a añadir
 * @return int Número con el dígito añadido
 */
function pegarPorDelante(int $number, int $digit): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Añadimos el dígito por detrás
  $numberString = strval($digit) . $numberString;
  // Devolvemos el número
  return intval($numberString);
}

/**
 * Toma como parámetros las posiciones inicial y final dentro de un número y devuelve el trozo correspondiente
 * @param int $number Número a comprobar
 * @param int $start Posición inicial
 * @param int $end Posición final
 * @return int Trozo del número
 */
function trozoDeNumero(int $number, int $start, int $end): int
{
  // Convertimos el número a string
  $numberString = strval($number);
  // Devolvemos el trozo del número
  return intval(substr($numberString, $start, $end));
}

/**
 * Pega dos números para formar uno
 * @param int $number1 Primer número
 * @param int $number2 Segundo número
 * @return int Número formado por los dos números
 */
function juntaNumeros(int $number1, int $number2): int
{
  // Convertimos los números a string
  $number1String = strval($number1);
  $number2String = strval($number2);
  // Devolvemos el número formado por los dos números
  return intval($number1String . $number2String);
}

/**
 * Convierte un número decimal en binario
 * @param int $number Número decimal
 * @return int Número binario
 */
function decimalToBinary(int $number): int { 
  return decbin($number);
}

/**
 * Comprueba si un número es decimal
 * @param int $number Número a comprobar
 * @return bool True si es decimal, false si no
 */
function isDecimal($number): bool {
  return preg_match('/^[0-9]+$/', $number);
}

/**
 * Convierte un número binario en decimal
 * @param int $number Número binario
 * @return int Número decimal
 */
function binaryToDecimal(int $number): int { 
  return bindec($number);
}

/**
 * Comprueba si un número es binario
 * @param int $number Número a comprobar
 * @return bool True si es binario, false si no
 */
function isBinary($number): bool {
  return preg_match('/^[01]+$/', $number);
}

/**
 * Convierte un número decimal en octal
 * @param int $number Número decimal
 * @return int Número octal
 */
function decimalToOctal(int $number): int { 
  return decoct($number);
}

/**
 * Convierte un número octal en decimal
 * @param int $number Número octal
 * @return int Número decimal
 */
function octalToDecimal(int $number): int { 
  return octdec($number);
}

/**
 * Comprueba si un número es octal
 * @param int $number Número a comprobar
 * @return bool True si es octal, false si no
 */
function isOctal($number): bool {
  return preg_match('/^[0-7]+$/', $number);
}

/**
 * Convierte un número decimal en hexadecimal
 * @param int $number Número decimal
 * @return int Número hexadecimal
 */
function decimalToHexadecimal(int $number): string { 
  return dechex($number);
}

/**
 * Convierte un número hexadecimal en decimal
 * @param int $number Número hexadecimal
 * @return int Número decimal
 */
function hexadecimalToDecimal($number): int { 
  return hexdec($number);
}

/**
 * Comprueba si un número es hexadecimal
 * @param int $number Número a comprobar
 * @return bool True si es hexadecimal, false si no
 */
function isHexadecimal($number): bool {
  return preg_match('/^[0-9A-F]+$/', $number);
}