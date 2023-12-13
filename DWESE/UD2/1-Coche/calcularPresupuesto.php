<?php
include_once("credenciales.php"); // Incluimos las credenciales
session_start(); // Iniciamos la sesión


// Comprobamos que el usuario y la contraseña sean correctos y que existan en la sesión
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"]) || !($_SESSION["username"]==USERNAME) || !($_SESSION["password"]==PASSWORD)) {
  // Si no existen, redirigimos al usuario a la página de login
  header("Location: index.php");
  // Y salimos del script
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calcular Presupuesto</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper comanda">
    <h1>Calcular Presupuesto</h1>
    <?php
    session_start(); // Iniciamos la sesión

    // Inicializamos las variables
    $datosObtenidos = false;
    $modelo = "";
    $color = "";
    $marca = "";
    $puertas = "";
    $cv = "";
    $tipoDeMotor = "";

    // Comprobamos que se ha enviado el formulario
    if (isset($_POST["submit-formulario-coche"])) {
      // Recogemos los datos del formulario
      $modelo = getStringFromForm("modelo");
      $color = getStringFromForm("color");
      $marca = getStringFromForm("marca");
      $puertas = getNumberFromForm("puertas");
      $cv = getNumberFromForm("cv");
      $tipoDeMotor = getStringFromForm("tipoDeMotor");

      $_SESSION['post_data'] = $_POST; // Guardamos los datos del formulario en la sesión
      $_SESSION['isFinanciado'] = false; // Indicamos que no se ha financiado

      $datosObtenidos = true; // Indicamos que se han obtenido los datos
    } elseif (isset($_SESSION['post_data'])) { // Si no se ha enviado el formulario pero hay datos en la sesión
      // Recogemos los datos del formulario
      $modelo = $_SESSION['post_data']['modelo'];
      $color = $_SESSION['post_data']['color'];
      $marca = $_SESSION['post_data']['marca'];
      $puertas = $_SESSION['post_data']['puertas'];
      $cv = $_SESSION['post_data']['cv'];
      $tipoDeMotor = $_SESSION['post_data']['tipoDeMotor'];

      $datosObtenidos = true; // Indicamos que se han obtenido los datos
    }

    if ($datosObtenidos) { // Si se han obtenido los datos
      // Mostramos los datos del formulario
      echo "<div class='datos-container'>
              <div class='datos'>
                <div class='dato'><p>Modelo: $modelo</p></div>
                <div class='dato'><p>Color: $color</p></div>
                <div class='dato'><p>Marca: $marca</p></div>
                <div class='dato'><p>Puertas: $puertas</p></div>
                <div class='dato'><p>Cv: $cv</p></div>
                <div class='dato'><p>Tipo de motor: $tipoDeMotor</p></div>
              </div>
            </div>";
    } else { // Si no se han obtenido los datos
      echo "<p>No se han obtenido los datos del formulario</p>";
    }


    // ------------------ FINANCIACIÓN ------------------  //
    // Comprobamos si se ha seleccionado financiar
    if (isset($_POST["financiar"]) && $_POST["financiar"] == "si") {
      $_SESSION['isFinanciado'] = true; // Indicamos que se ha financiado
    }

    // Si no se ha enviado el formulario y no se ha seleccionado financiar
    if (!isset($_POST["financiar"]) && $_SESSION["isFinanciado"] == false) {
      echo "<form action='calcularPresupuesto.php' method='post'>
              <label for='financiar'>Deseas Financiar:</label> <br>
              <input type='radio' name='financiar' id='financiar' value='si' require> Si <br>
              <input type='radio' name='financiar' id='' value='no' require> No <br>
              <input type='submit' value='Enviar'>
            </form>";
      
      // Si se ha enviado el formulario y se ha seleccionado financiar
      // Mostramos el formulario de financiación
    } elseif ($_SESSION["isFinanciado"] == true && isset($_POST["financiar"])) { 
      echo "<p>Financiar</p>";
      echo '
      <form action="calcularPresupuesto.php" method="post">
      <label for="entrada">Entrada:</label>
      <select name="entrada" >
        <option value="1000">1000</option>
        <option value="5000">5000</option>
        <option value="10000">10000</option>
      </select>
      <br>
      <label for="financiacionAños">A cuanto deseas financiar</label>
      <select name="financiacionAños">
        <option name="financiacionAños" value="8">12 meses - 8%</option>
        <option name="financiacionAños" value="16">36 meses - 16%</option>
      </select>
      <br>
      <input type="submit" name="submit-financiacion" value="Enviar">
    </form>
      ';
    } elseif($_SESSION["isFinanciado"] == false) { // Si se ha enviado el formulario y se ha seleccionado no financiar 
      // Mostramos el precio total
      $total = calcularPrecioGlobal($modelo, $color, $marca, $puertas, $cv, $tipoDeMotor);
      echo "<p>El precio total a pagar es de $total €</p>";
    }
    ?>



    <?php
    // ------------------ CALCULAR PRECIO DE FINANCIACIÓN ------------------  //
    // Realizar la financiación
    if (isset($_POST["submit-financiacion"])) {
      $entrada = $_POST["entrada"]; // Obtener la entrada que se ha seleccionado
      $financiacionAñosPorcentaje = $_POST["financiacionAños"]; // Obtener la financiación que se ha seleccionado
      $total = calcularPrecioGlobal($modelo, $color, $marca, $puertas, $cv, $tipoDeMotor); // Calcular el precio total del coche
      // Restar la entrada al precio total del coche
      $totalFinanciado = $total - $entrada;
      // Calcular el precio mas el porcentaje de financiación
      $totalFinanciado = $totalFinanciado + ($totalFinanciado * ($financiacionAñosPorcentaje / 100));
      // Calcular los meses de financiación en base al porcentaje de financiación 
      // Si es 8% son 12 meses, si es 16% son 36 meses
      $meses = $financiacionAñosPorcentaje == 8 ? 12 : 36;
      // Calcular el precio total financiado por meses
      $totalFinanciadoPorMeses = round($totalFinanciado / $meses * 100) / 100;
      echo "<p>El precio del coche es de $totalFinanciado €</p>";
      echo "<p>El precio total a pagar es de $totalFinanciadoPorMeses € en $meses meses</p>";
    }



    // ------------------ FUNCIONES ------------------  //

    /**
     * Obtiene un string del formulario sanitizandolo
     * @param string $formName Nombre del campo del formulario
     * @return string String del formulario
     */
    function getStringFromForm($formName)
    {
      $string = filter_input(INPUT_POST, $formName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if (empty($string)) {
        $string = "Error, el campo esta vacío";
      }
      return $string;
    }

    /**
     * Obtiene un número del formulario sanitizandolo
     * @param string $formName Nombre del campo del formulario
     * @return int Número del formulario o error
     */
    function getNumberFromForm($formName)
    {
      $number = filter_input(INPUT_POST, $formName, FILTER_SANITIZE_NUMBER_INT);
      if (empty($number)) {
        $number = "Error, el campo esta vacío";
      }
      return $number;
    }

    /**
     * Calcula el precio del modelo
     * @param string $modelo Modelo del coche
     * @return int Precio del modelo
     */
    function calcularPrecioModelo($modelo)
    {
      switch ($modelo) {
        case 'SUV':
          return 10000;
          break;
        case '4x4':
          return 12000;
          break;
        case 'Deportivo':
          return 20000;
          break;
        case 'Familiar':
          return 7000;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio del color
     * @param string $color Color del coche
     * @return int Precio del color
     */
    function calcularPrecioColor($color) {
      switch ($color) {
        case 'Rojo':
          return 1000;
          break;
        case 'Azul':
          return 1200;
          break;
        case 'Amarillo':
          return 2000;
          break;
        case 'Blanco':
          return 700;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio de la marca
     * @param string $marca Marca del coche
     * @return int Precio de la marca
     */
    function calcularPrecioMarca($marca) {
      switch ($marca) {
        case 'BMW':
          return 10000;
          break;
        case 'Volkswagen':
          return 50000;
          break;
        case 'Range Rover':
          return 11000;
          break;
        case 'Kia':
          return 7000;
          break;
        case 'Peugeot':
          return 8000;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio de las puertas
     * @param string $puertas Puertas del coche
     * @return int Precio de las puertas
     */
    function calcularPrecioPuertas($puertas) {
      switch ($puertas) {
        case '5':
          return 1000;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio del cv
     * @param string $cv Cv del coche
     * @return int Precio del cv
     */
    function calcularPrecioCv($cv) {
      switch ($cv) {
        case '73':
          return 1000;
          break;
        case '100':
          return 2000;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio del tipo de motor
     * @param string $tipoDeMotor Tipo de motor del coche
     * @return int Precio del tipo de motor
     */
    function calcularPrecioTipoDeMotor($tipoDeMotor) {
      switch ($tipoDeMotor) {
        case 'Diesel':
          return 1000;
          break;
        case 'Gasolina':
          return 2000;
          break;
        case 'Hibrido':
          return 3000;
          break;
        case 'Electrico':
          return 4000;
          break;
        default:
          return 0;
          break;
      }
    }

    /**
     * Calcula el precio total del coche en base a los datos del formulario
     * @param string $modelo Modelo del coche
     * @param string $color Color del coche
     * @param string $marca Marca del coche
     * @param string $puertas Puertas del coche
     * @param string $cv Cv del coche
     * @param string $tipoDeMotor Tipo de motor del coche
     * @return int Precio total del coche
     */
    function calcularPrecioGlobal($modelo, $color, $marca, $puertas, $cv, $tipoDeMotor) {
      $precioModelo = calcularPrecioModelo($modelo);
      $precioColor = calcularPrecioColor($color);
      $precioMarca = calcularPrecioMarca($marca);
      $precioPuertas = calcularPrecioPuertas($puertas);
      $precioCv = calcularPrecioCv($cv);
      $precioTipoDeMotor = calcularPrecioTipoDeMotor($tipoDeMotor);

      $precioTotal = $precioModelo + $precioColor + $precioMarca + $precioPuertas + $precioCv + $precioTipoDeMotor;
      return $precioTotal;
    }
    ?>
  </div>
</body>

</html>