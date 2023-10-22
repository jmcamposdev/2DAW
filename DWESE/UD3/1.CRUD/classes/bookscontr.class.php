<?php

class BooksContr extends Books {

  // Function to remove a Book from the DB
  public function removeBook($id) {
    return $this->deleteBook($id);
  }

  // Function to edit a Book from the DB
  public function editBook($id, $title, $category, $author, $description) {
    return $this->updateBook($id, $title, $category, $author, $description);
  }

  // Function to create a Book in the DB
  public function createBook($title, $category, $author, $description) {
    return $this->setBook($title, $category, $author, $description);
  }
}