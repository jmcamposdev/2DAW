<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 07</title>
</head>

<!-- Realiza el control de acceso a una caja fuerte. 
La combinación será un número de 4 cifras. 
El programa nos pedirá la combinación para abrirla. 
Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la combinación” y si acertamos 
se nos dirá “La caja fuerte se ha abierto satisfactoriamente”. 
Tendremos cuatro oportunidades para abrir la caja fuerte.
!-->

<body>
  <h3>Adivina el código de la Caja Fuerte</h3>
  <form action="adivina.php" method="post">
    <input type="number" name="numeroIntroducido" required>
    <input type="hidden" name="oportunidades" value="4">
    <input type="submit" value="Continuar">
  </form>
</body>

</html>