<?php

class AuthorContr extends Author {
  public function getId($name, $surname) {
    return $this->getIdFromAuthor($name, $surname);
  }
}