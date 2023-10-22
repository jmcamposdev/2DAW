<?php

/**
 * This class is the Model of the MVC (Model View Controller) Architecture.
 * The function of this model is to make the connections with the DB and return the results
 * 
 */
class Books extends Dbh {

  /**
   * This function returns all the books from the DB
   * Returns an associative array with all the books
   */
  protected function getBooks() {
    $sql = "SELECT 
    LIBROS.id_libro, 
    LIBROS.titulo, 
    LIBROS.categoria, 
    AUTORES.nombre AS nombreAutor, 
    AUTORES.apellidos AS apellidosAutor, 
    LIBROS.descripcion 
    FROM LIBROS 
    JOIN AUTORES ON LIBROS.autor_id = AUTORES.id_autor";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();  
    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getBooksByCategory($category) {
    $sql = "SELECT LIBROS.titulo,
    LIBROS.categoria,
    AUTORES.nombre AS nombreAutor,
    AUTORES.apellidos AS apellidosAutor,
    LIBROS.descripcion
    FROM LIBROS JOIN AUTORES ON LIBROS.autor_id = AUTORES.id_autor 
    WHERE LIBROS.categoria = ?";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$category]);  
    $result = $stmt->fetchAll();
    return $result;
  }
}