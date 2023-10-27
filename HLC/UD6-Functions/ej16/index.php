<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primos</title>
</head>
<body>
  <h1>Números Capicua entre 1 y 99999</h1>
  <?php
    include_once '../ej01-14/globalFunctions.php';
    for ($i=1; $i <= 99999; $i++) { 
      if (esCapicua($i)) {
        echo "$i<br>";
      }
    }
    ?>
</body>
</html>