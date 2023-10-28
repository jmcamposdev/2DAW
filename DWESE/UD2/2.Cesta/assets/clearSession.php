<?php
if (isset($_POST['clearSessionFrom'])) {
  session_start(); // Initialize the session
  session_destroy(); // Destroy the session
  header("Location: ../index.php"); // Redirect to the index.php
}
