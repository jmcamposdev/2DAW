<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 26</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Posiciones</h1>
  <?php
  /**
   * Realiza un programa que pida primero un número y a continuación un dígito. 
   * El programa nos debe dar la posición (o posiciones) contando de izquierda a derecha que ocupa ese dígito en el número introducido.
   */
  session_start(); // Iniciamos la sesión
  //session_destroy(); // Destruimos la sesión

  if (!isset($_POST['num']) && !isset($_SESSION['num'])) { // Si no se ha enviado el formulario
    $_SESSION['digit'] = null; // Inicializamos la variable de sesión
    $_SESSION['num'] = null; // Inicializamos la variable de sesión 
  } elseif (isset($_POST["num"]) && is_numeric($_POST["num"])) { // Si se ha enviado el formulario
    $_SESSION['num'] = $_POST["num"]; // Guardamos el número en una variable de sesión
  }

  if (isset($_POST['digit']) && is_numeric($_POST['digit'])) { // Si se ha enviado el formulario
    $_SESSION['digit'] = $_POST['digit']; // Guardamos el dígito en una variable de sesión
  }

  if (isset($_SESSION['num']) && !isset($_SESSION['digit'])) {
    echo "<form action='index.php' method='post'>
    <label for='digit'>Dígito:</label>
    <input type='number' name='digit' id='digit' required>
    <input type='submit' value='Enviar'>
    </form>";
  } elseif (!isset($_SESSION['num']) && !isset($_SESSION['digit'])) {
    echo '<form action="index.php" method="post">
    <label for="num">Número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
    <br>
  </form>';
  }

  if (isset($_SESSION['num']) && isset($_SESSION['digit'])) {
    $find = strpos_recursive($_SESSION['num'], $_SESSION['digit']);
    
    echo "<p>El dígito " . $_SESSION['digit'] . " se encuentra en la posición del número " . $_SESSION['num'] . " en las posiciones: <br> ";
    foreach ($find as $key => $value) {
      echo $value+1 . "<br>";
    }
    echo "</p>";
  }
  

  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {                
        $offset = strpos($haystack, $needle, $offset);
        if($offset === false) {
            return $results;            
        } else {
            $results[] = $offset;
            return strpos_recursive($haystack, $needle, ($offset + 1), $results);
        }
    }
  ?>
</body>

</html>