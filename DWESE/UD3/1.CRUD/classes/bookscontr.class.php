<?php

class BooksContr extends Books {

  // Function to remove a Book from the DB
  public function removeBook($id) {
    return $this->deleteBook($id);
  }
}