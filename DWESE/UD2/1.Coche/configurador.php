<?php
include_once("credenciales.php"); // Incluimos las credenciales
session_start(); // Iniciamos la sesión

// Comprobamos que el usuario y la contraseña sean correctos y que existan en la sesión
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"]) || !($_SESSION["username"] == USERNAME) || !($_SESSION["password"] == PASSWORD)) {
  // Si no existen, redirigimos al usuario a la página de login
  header("Location: index.php");
  // Y salimos del script
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Financiación Coche</title>
  <link rel="stylesheet" href="style.css"/>
</head>

<body>
<section class="wrapper">

  <h1 class="title">SELECT</h1>
  <hr>
  <h2>Your car</h2>
  <form action="calcularPresupuesto.php" method="post" class="form-style-5">
    <!-- Modelo -->
    <label for="modelo">Modelo:
      <select name="modelo" id="modelo" required>
        <option value="">Elige una opción</option>
        <option value="SUV">SUV</option>
        <option value="4x4">4x4</option>
        <option value="Deportivo">Deportivo</option>
        <option value="Familiar">Familiar</option>
      </select>
    </label>

    <!-- Color -->
    <label for="color">Color:
      <select name="color" id="color" required>
        <option value="">Elige una opción</option>
        <option value="Blanco">Blanco</option>
        <option value="Negro">Negro</option>
        <option value="Rojo">Rojo</option>
        <option value="Azul">Azul</option>
        <option value="Amarillo">Amarillo</option>
      </select>
    </label>

    <!-- Marca -->
    <label for="marca">Marca:
      <select name="marca" id="marca" required>
        <option value="">Elige una opción</option>
        <option value="BMW">BMW</option>
        <option value="Volkswagen">Volkswagen</option>
        <option value="Range Rover">Range Rover</option>
        <option value="Kia">Kia</option>
        <option value="Peugeot">Peugeot</option>
      </select>
    </label>

    <!-- Puertas -->
    <label for="puertas">Puertas:
      <select name="puertas" id="puertas" required>
        <option value="">Elige una opción</option>
        <option value="3">3</option>
        <option value="5">5</option>
      </select>
    </label>

    <!-- Caballos -->
    <label for="cv">CV:
      <select name="cv" id="cv" required>
        <option value="">Elige una opción</option>
        <option value="60">60</option>
        <option value="73">73</option>
        <option value="100">100</option>
      </select>
    </label>

    <!-- Tipo de Motor: -->
    <label for="tipoDeMotor">Tipo de Motor:
      <select name="tipoDeMotor" id="tipoDeMotor" required>
        <option value="">Elige una opción</option>
        <option value="Diesel">Diesel</option>
        <option value="Gasolina">Gasolina</option>
        <option value="Híbrido">Híbrido</option>
        <option value="Eléctrico">Eléctrico</option>
      </select>
    </label>
    <input type="submit" name="submit-formulario-coche" value="Solicitar"/>
  </form>
</section>
</body>

</html>