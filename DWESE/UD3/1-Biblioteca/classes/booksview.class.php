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
                      <form action='dashboard.php' method='post'>
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


  /**
   * This function generates the HTML for the book form
   * @param $title: The title of the form
   * @param $action: The action attribute of the form
   * @param $book: An array with the book data to pre-fill the form
   * Returns the HTML for the book form
   */
  private function generateBookForm($title, $action, $book) {
    $authorObj = new AuthorView();
    $html = "";
    $html .= "<section class='popup__container popup__container--active'>";
    $html .= "<div class='wrapper'>";
    $html .= "<div class='close__button'>";
    $html .= "<?xml version='1.0' encoding='iso-8859-1'?>
    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
    <svg fill='#000000' height='800px' width='800px' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' 
    viewBox='0 0 490 490' xml:space='preserve'>
    <polygon points='456.851,0 245,212.564 33.149,0 0.708,32.337 212.669,245.004 0.708,457.678 33.149,490 245,277.443 456.851,490 
      489.292,457.678 277.331,245.004 489.292,32.337 '/>
    </svg>";
    $html .= "</div>";
    $html .= "<h3>$title</h3>";
    $html .= "<form action='$action' method='post'>";
    if (isset($book['id_libro'])) {
      $html .= "<input type='hidden' name='id' value='" . $book['id_libro'] . "'>";
    }
    $html .= "<label for='title'>Title</label>";
    $html .= "<input type='text' name='title' id='title' value='" . ($book['titulo'] ?? '') . "'>";
    $html .= "<label for='category'>Category</label>";
    $html .= "<select name='category' id='category'>";
    foreach (self::$categories as $category) {
      if (isset($book['categoria']) && $category == $book['categoria']) {
        $html .= "<option value='$category' selected>" . ucfirst($category) . "</option>";
      } else {
        $html .= "<option value='$category'>" . ucfirst($category) . "</option>";
      }
    }
    $html .= "</select>";
    $html .= "<label for='authorId'>Author</label>";
    $html .= "<select name='authorId' id='author'>";
    $html .= $authorObj->showAuthorsSelectOptions($book['nombreAutor'] ?? NULL, $book['apellidosAutor'] ?? NULL);
    $html .= "</select>";
    $html .= "<label for='description'>Description</label>";
    $html .= "<textarea name='description' id='description' cols='30' rows='10'>" . ($book['descripcion'] ?? '') . "</textarea>";
    $html .= "<input type='submit' name='" . ($title == 'Create Book' ? 'submitCreateBook' : 'submitEditBook') . "' value='" . ($title == 'Create Book' ? 'Create Book' : 'Edit Book') . "'>";
    $html .= "</form>";
    $html .= "</div>";
    $html .= "</section>";
    return $html;
  }

  public function showFormEditBook($id) {
    $result = $this->getBookById($id);
    if (empty($result)) {
      return "<h3>No book found</h3>";
    }
    return $this->generateBookForm('Edit Book', 'includes/editBook.inc.php', $result);
  }

  public function showCreateBookForm() {
    return $this->generateBookForm('Create Book', 'includes/createBook.inc.php', []);
  }

}