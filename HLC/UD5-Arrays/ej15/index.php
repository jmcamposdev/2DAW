<?php

/**
 * Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada
 * una posición en el sentido de las agujas del reloj. La matriz debe tener
 * 12 filas por 12 columnas y debe contener números generados al azar entre 0 y 100.
 * Se debe mostrar tanto la matriz original como la matriz resultado, ambas con los números convenientemente alineados.
 */

$matrizRotada = array();

for ($i = 0; $i < 12; $i++) {
    for ($j = 0; $j < 12; $j++) {
        $matriz[$i][$j] = rand(0, 100);
    }
}

echo "<table border='1'>";

for ($i = 0; $i < 12; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 12; $j++) {
        echo "<td>" . $matriz[$i][$j] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

// Rotamos la matriz
for ($i = 0; $i < 12; $i++) {
    for ($j = 0; $j < 12; $j++) {
        $matrizRotada[$i][$j] = $matriz[11 - $j][$i];
    }
}

echo "<table border='1'>";

for ($i = 0; $i < 12; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 12; $j++) {
        echo "<td>" . $matrizRotada[$i][$j] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
