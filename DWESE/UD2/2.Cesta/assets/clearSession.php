<?php
if (isset($_POST['clearSessionFrom'])) {
  session_start(); // Iniciarmos la sessión para obtener los datos
  session_destroy(); // Destruimos la sessión
  header("Location: ../index.php"); // Redirigimos al inicio de la web
}
