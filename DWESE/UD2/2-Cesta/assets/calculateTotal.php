<?php
if (isset($_SESSION['cart'])) {
  $suma = 0;
  foreach ($_SESSION['cart'] as $producto => $value) {
    // Si el producto no es extra, sumamos su precio
    if ($producto != "extras") {
      $suma += $value["price"];
    }
  }
  // Sumamos el precio de los extras si existen
  if (isset($_SESSION['cart']['extras'])) { // Si existe el array de extras
    // Iteramos por cada extra
    foreach ($_SESSION['cart']['extras'] as $producto => $value) {
      // Sumamos el precio de cada extra
      $suma += $value["price"] * $value['quantity'];
    }
  }
  echo $suma . "€";
} else {
  echo "0€";
}