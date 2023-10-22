<?php

if (isset($_POST['submitEditBook'])) {
  require_once '../classes/dbh.class.php';
  require_once '../classes/author.class.php';
  require_once '../classes/authorcontr.class.php';
  require_once '../classes/books.class.php';
  require_once '../classes/bookscontr.class.php';
  require_once '../classes/booksview.class.php';

  // Get the data from the form
  $id = $_POST['id'];
  $title = $_POST['title'];
  $category = $_POST['category'];
  $authorId = $_POST['authorId'];
  $description = $_POST['description'];

  $authorContrObj = new AuthorContr();

  if (!$authorContrObj->existsAuthor($authorId)) {
    header("location: ../index.php?error=authornotexists");
    exit();
  } else if (empty($title) || empty($category)|| empty($description) || empty($authorId)) {
    header("location: ../index.php?error=emptyinput");
    exit();
  } else {
    // Create an object from the BooksContr class
    $booksContrObj = new BooksContr();
    // Try to edit the book
    if ($booksContrObj->editBook($id, $title, $category, $authorId, $description)) {
      // If the book is edited successfully, we redirect to the index.php file with the error=none parameter
      header("location: ../index.php?error=none");
      exit();
    } else {
      // If the book is not edited successfully, we redirect to the index.php file with the error=stmtfailed parameter
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
  
  }
} else {
  header("location: ../index.php");
  exit();
}