<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 01</title>
</head>
<body>
  <?php
    // Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for.

    for ($i=0; $i <= 100; $i++) { 
      // Si es múltiplo de 5 imprimir el número sino un String vacío
      echo $i % 5 == 0 ? "$i <br>" : "";
    }
  ?>
</body>
</html>