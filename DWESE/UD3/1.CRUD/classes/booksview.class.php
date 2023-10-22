<?php

class BooksView extends Books {

  static $categories = ["fantasia", "tragedia", "novela", "ficcion", "filosofia", "historica", "narrativa", "policiaca", "intriga"];

  private function generateBooksTable($result) {
    $html = "";
    $html .= "<table>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th>Title</th>";
    $html .= "<th>Category</th>";
    $html .= "<th>Author</th>";
    $html .= "<th>Description</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";
    foreach ($result as $row) {
      $html .= "<tr>";
      $html .= "<td>" . $row['titulo'] . "</td>";
      $html .= "<td>" . $row['categoria'] . "</td>";
      $html .= "<td>" . $row['nombreAutor'] . " " . $row['apellidosAutor'] . "</td>";
      $html .= "<td>" . $row['descripcion'] . "</td>";
      if (isset($row['id_libro'])) {
        $html .= "<td>
                      <form action='includes/deleteBook.inc.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id_libro'] . "'>
                        <input class='delete__button' type='submit' name='submitDeleteBook' value='Delete'>
                      </form>
                  </td>";
      }
      $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";
    return $html;
  }

  public function showBooks() {
    $result = $this->getBooks();
    if (empty($result)) {
      return "<h3>No books found</h3>";
    }
    return $this->generateBooksTable($result);
  }

  public function showBooksByCategory($category) {
    $result = $this->getBooksByCategory($category);
    if (empty($result)) {
      return "<h3>No books found in this category</h3>";
    }
    return $this->generateBooksTable($result);
  }

}