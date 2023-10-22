<?php
include "includes/class-autoload.inc.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <main>
    <header class="header">
      <div class="logo">
        <h1>LIBRARY/&gt;</h1>
      </div>
    </header>

    <section class="content">
      <div class="title__container">
        <h2>Books</h2>
        <div class="separator"></div>
      </div>
      <div class="table__container">
        <?php
        // If we don't have the category in the session, we show all the books
        if (!isset($_POST['submitBooksCategories']) && !isset($_SESSION['category'])) {
          $booksObj = new BooksView();
          echo $booksObj->showBooks();
        } else {
          if (isset($_POST['submitBooksCategories'])) {
            $category = $_POST['category'];
            $_SESSION['category'] = $category;
          } else {
            $category = $_SESSION['category'];
          }

          if ($category == "all") {
            $booksObj = new BooksView();
            echo $booksObj->showBooks();
          } else {
            $booksObj = new BooksView();
            echo $booksObj->showBooksByCategory($category);
          }
        }
        ?>
        <div class="books__action__container">
          <div class="filter__container">
            <h3>Filter</h3>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <label for="category">Category</label>
              <select name="category" id="category">
                <option value="all">All</option>
                <?php
                foreach (BooksView::$categories as $category) {
                  if (isset($_SESSION['category']) && $_SESSION['category'] == $category) {
                    echo "<option value='$category' selected>" . ucfirst($category) . "</option>";
                  } else if (isset($_POST['submitBooksCategories']) && $_POST['category'] == $category) {
                    echo "<option value='$category' selected>" . ucfirst($category) . "</option>";
                  } else {
                    echo "<option value='$category'>" . ucfirst($category) . "</option>";
                  }
                }
                ?>
              </select>
              <input type="submit" name="submitBooksCategories" value="Filter">
            </form>
          </div>
          <div class="create__container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <input type="submit" name="submitCreateBook" value="Create New Book">
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php
    if (isset($_POST['submitEditBook'])) {
      $id = $_POST['id'];
      $booksObj = new BooksView();
      echo $booksObj->showFormEditBook($id);
    }
    ?>
    <?php
    if (isset($_POST['submitCreateBook'])) {
      $booksObj = new BooksView();
      echo $booksObj->showCreateBookForm();
    }
    ?>
  </main>
  <script src="popup.js"></script>
</body>

</html>