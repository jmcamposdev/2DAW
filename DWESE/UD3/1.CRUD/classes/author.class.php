<?php

/**
 * Class to manage the authors
 */
class Author extends Dbh {

  /**
   * Return the id of an author with the name and surname passed as parameters
   */
  protected function getIdFromAuthor($name, $surname) {
    $sql = "SELECT id_autor FROM AUTORES WHERE nombre = ? AND apellidos = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $surname]);
    $result = $stmt->fetch();
    return $result['id_autor'];
  }
}