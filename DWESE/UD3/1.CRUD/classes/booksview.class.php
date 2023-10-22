<?php

class BooksView extends Books {

  static $categories = ["fantasia", "tragedia", "novela", "ficcion", "filosofia", "historica", "narrativa", "policiaca", "intriga"];

  public function showBooks() {
    $result = $this->getBooks();
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
      $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";
    return $html;
  }

  public function showBooksByCategory($category) {
    $result = $this->getBooksByCategory($category);
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
      $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";
    return $html;
  }
}