<?php
// Initialize the session
session_start();

// If the first plate is not selected, redirect to the index.php with an error
if (!isset($_SESSION['firstSelectedProduct']) || $_SESSION['firstSelectedProduct'] == -1) {
  header("Location: index.php?error=You need to select one plate");
}

// If the second plate id is not set, initialize it with -1
if (!isset($_SESSION['secondSelectedProduct'])) {
  $_SESSION['secondSelectedProduct'] = -1;
}

// Products
const products = [
  [
    "id" => 1,
    "name" => "Chicken croquettes",
    "price" => 8,
    "image" => "./img/secondPlate/producto-1.jpg"
  ],
  [
    "id" => 2,
    "name" => "Hake in green sauce",
    "price" => 10,
    "image" => "./img/secondPlate/producto-2.jpg"
  ],
  [
    "id" => 3,
    "name" => "Squid with onions",
    "price" => 12,
    "image" => "./img/secondPlate/producto-3.jpg"
  ],
  [
    "id" => 4,
    "name" => "Tuna burgers",
    "price" => 14,
    "image" => "./img/secondPlate/producto-4.jpg"
  ],
  [
    "id" => 5,
    "name" => "Eggs with prawns in paella",
    "price" => 19,
    "image" => "./img/secondPlate/producto-5.jpg"
  ],
  [
    "id" => 6,
    "name" => "Prawn Paella",
    "price" => 7,
    "image" => "./img/secondPlate/producto-6.jpg"
  ]
];


// If the user select a plate
if (isset($_POST['id'])) {
  // Get the id, name and price of the product
  $id = $_POST['id'];
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  // Save the id of the product in the session
  $_SESSION['secondSelectedProduct'] = $id;
  // Create the product
  $producto = ["id" => $id, "name" => $name, "price" => $price];
  // Add the product to the cart
  $_SESSION['cart']['secondPlate'] = $producto;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurante</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php 
// Include the header
include_once "./assets/header.php"; 
?>
<section class="nav__container">
  <div class="arrow__container">
    <a href="index.php" class="arrow__wrapper">
      <img class="left-arrow" src="./img/arrow.svg" alt="Right Arrow">
      <span>Previous</span>
    </a>
  </div>
  <div class="title">
    <h1>Second Plate</h1>
  </div>
  <div class="arrow__container">
    <a href="extras.php" class="arrow__wrapper">
      <span>Next</span>
      <img class="right-arrow" src="./img/arrow.svg" alt="Right Arrow">
    </a>
  </div>
</section>
<section class="error_container">
  <?php
  // If there is an error, show it
  if (isset($_GET['error'])) {
    echo $_GET['error'];
  }
  ?>
</section>
<section class="productos__wrapper">
  <div class="productos__container">
    <?php
    // Show the products
    foreach (products as $product) {
      $buttonText = $_SESSION['secondSelectedProduct'] == $product['id'] ? "<img src='./img/check.svg'/>" : "Añadir";
      echo "<div class='producto__wrapper'>";
      echo "<div class='producto'>";
      echo "<img src='" . $product['image'] . "' alt='Producto'>";
      echo "<h3>" . $product['name'] . "</h3>";
      echo "<p class='producto__precio'>" . $product['price'] . "€</p>";
      echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
      echo "<input type='hidden' name='id' value='" . $product['id'] . "'>";
      echo "<input type='hidden' name='productName' value='" . $product['name'] . "'>";
      echo "<input type='hidden' name='productPrice' value='" . $product['price'] . "'>";
      echo "<button class='producto__btn'>{$buttonText}</button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
</section>
</body>
</html>