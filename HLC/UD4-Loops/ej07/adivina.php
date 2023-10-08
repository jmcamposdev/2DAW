<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 7 - Adivina</title>
</head>
<body>
  <?php
    define("SecretNumber", 4254);
    $numeroIntroducido = $_POST["numeroIntroducido"];
    $oportunidades = $_POST["oportunidades"];

    if ($numeroIntroducido == SecretNumber) {
      echo "<p>La caja fuerte se ha abierto satisfactoriamente</p>";
    } else {
      $oportunidades--;
      if ($oportunidades > 0) {
        echo "<p>Lo siento, esa no es la combinación. Te quedan $oportunidades oportunidades.</p>";
        echo "<form action='adivina.php' method='post'>";
        echo "<input type='number' name='numeroIntroducido' required>";
        echo "<input type='hidden' name='oportunidades' value='" . $oportunidades . "'>";
        echo "<input type='submit' value='Continuar'>";
        echo "</form>";
      } else {
        echo "<p>Lo siento, has agotado todas tus oportunidades. El número era " . SecretNumber . ".</p>";
      }
    }
  ?>
</body>
</html>