<?php
require_once '../classes/dbh.class.php';
require_once '../classes/users.class.php';
require_once '../classes/userscontr.class.php';
require_once '../classes/usersview.class.php';

// Logout the user
$usersContrObj = new UsersContr();
$usersContrObj->logoutUser();