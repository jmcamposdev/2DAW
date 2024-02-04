<?php

// If the user didn't click the submit button, redirect him to the index page
if (!isset($_POST['submitLogin'])) {
  header("location: ../index.php");
  exit();
}

require_once '../classes/dbh.class.php';
require_once '../classes/users.class.php';
require_once '../classes/userscontr.class.php';
require_once '../classes/usersview.class.php';

$username = $_POST['username'];
$password = $_POST['password'];

$usersContrObj = new UsersContr();
if ($usersContrObj->loginUser($username, $password)) {
  header("location: ../dashboard.php?error=none");
  exit();
} else {
  header("location: ../index.php?error=wronglogin");
  exit();
}
