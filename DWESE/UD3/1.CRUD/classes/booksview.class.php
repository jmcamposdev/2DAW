<?php
/**
 * This class is the View of the MVC (Model View Controller) Architecture.
 * The function of this view is to show the data to the user
 */
class BooksView extends Books {

  /**
   * Array with all the categories
   */
  static $categories = ["fantasia", "tragedia", "novela", "ficcion", "filosofia", "historica", "narrativa", "policiaca", "intriga"];

  /**
   * This function generates the HTML table with the books
   * @param $result: Array with the books to show
   * Returns the HTML table
   */
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
    // Generate the Books Rows
    foreach ($result as $row) {
      $html .= "<tr>";
      $html .= "<td>" . $row['titulo'] . "</td>";
      $html .= "<td>" . $row['categoria'] . "</td>";
      $html .= "<td>" . $row['nombreAutor'] . " " . $row['apellidosAutor'] . "</td>";
      $html .= "<td>" . $row['descripcion'] . "</td>";
      // If we have the id of the book, we show the delete button and the edit button
      if (isset($row['id_libro'])) {
        // We send the id of the book to the deleteBook.inc.php file
        $html .= "<td>
                      <form action='includes/deleteBook.inc.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id_libro'] . "'>
                        <input class='delete__button' type='submit' name='submitDeleteBook' value='Delete'>
                      </form>
                  </td>";
        // We send the id of the book to the editBook.inc.php file
        $html .= "<td>
                      <form action='editBook.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id_libro'] . "'>
                        <input class='edit__button' type='submit' name='submitEditBook' value='Edit'>
                      </form>
                    </td>";
      }
      $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";
    return $html;
  }

  /**
   * This function shows all the books
   * Returns the HTML table with all the books
   */
  public function showBooks() {
    $result = $this->getBooks();
    if (empty($result)) {
      return "<h3>No books found</h3>";
    }
    return $this->generateBooksTable($result);
  }

  /**
   * This function shows all the books from a category
   * @param $category: Category to filter
   * Returns the HTML table with all the books from the category
   */
  public function showBooksByCategory(string $category) {
    $result = $this->getBooksByCategory($category);
    if (empty($result)) {
      return "<h3>No books found in this category</h3>";
    }
    return $this->generateBooksTable($result);
  }

}