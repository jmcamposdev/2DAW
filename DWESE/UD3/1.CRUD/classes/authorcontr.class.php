<?php

class AuthorContr extends Author {
  public function getId($name, $surname) {
    return $this->getIdFromAuthor($name, $surname);
  }

  public function existsAuthor($id) {
    $result = $this->getAuthorById($id);
    
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

}