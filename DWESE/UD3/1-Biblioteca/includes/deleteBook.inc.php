<?php

if (isset($_POST['submitDeleteBook'])) {
  require_once '../classes/dbh.class.php';
  require_once '../classes/books.class.php';
  require_once '../classes/bookscontr.class.php';
  require_once '../classes/booksview.class.php';

  $id = $_POST['id'];

  $booksContrObj = new BooksContr();
  if ($booksContrObj->removeBook($id)) {
    header("location: ../dashboard.php?error=none");
    exit();
  } else {
    header("location: ../dashboard.php?error=stmtfailed");
    exit();
  }
} else {
  header("location: ../dashboard.php");
  exit();
}