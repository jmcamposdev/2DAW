<?php
include "includes/class-autoload.inc.php";
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
      if (!isset($_POST['submitBooksCategories'])) {
        $booksObj = new BooksView();
        echo $booksObj->showBooks();
      } else {
        $category = $_POST['category'];
        if ($category == "all") {
          $booksObj = new BooksView();
          echo $booksObj->showBooks();
        } else {
          $booksObj = new BooksView();
          echo $booksObj->showBooksByCategory($category);
        }
      }
      ?>
      <div class="filter__container">
        <h3>Filter</h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <select name="category" id="category">
            <option value="all">All</option>
            <?php
            foreach (BooksView::$categories as $category) {
              if (isset($_POST['submitBooksCategories']) && $_POST['category'] == $category) {
                echo "<option value='$category' selected>$category</option>";
              } else {
                echo "<option value='$category'>$category</option>";
              }
            }
            ?>
          </select>
          <input type="submit" name="submitBooksCategories" value="Filter">
        </form>
      </div>
      </div>
    </section>
  </main>
</body>

</html>