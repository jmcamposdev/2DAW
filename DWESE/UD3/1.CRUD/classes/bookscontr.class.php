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
}