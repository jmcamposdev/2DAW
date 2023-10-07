<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 03</title>
</head>

<body>
  <?php
  // Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle do-while.

  // Declaramos e inicializamos la variable 
  $i = 0;
  do {
    echo $i % 5 == 0 ? "$i <br>" : "";
  } while (++$i <= 100);
  ?>
</body>

</html>