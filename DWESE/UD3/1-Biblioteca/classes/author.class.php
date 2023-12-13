<?php

/**
 * Class to manage the authors
 */
class Author extends Dbh {
  /**
   * Return all the authors from the DB
   */
  protected function getAuthors() {
    $sql = "SELECT * FROM AUTORES";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getAuthorById($id) {
    $sql = "SELECT * FROM AUTORES WHERE id_autor = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    return $result;
  }


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