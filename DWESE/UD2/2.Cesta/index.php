<?php
// Initialize the session
session_start();

// Products
const products = [
  [
    "id" => 1,
    "name" => "Sirloin steak with green sauce",
    "price" => 25,
    "image" => "./img/firstPlate/producto-1.jpg"
  ],
  [
    "id" => 2,
    "name" => "Beef",
    "price" => 25,
    "image" => "./img/firstPlate/producto-2.jpg"
  ],
  [
    "id" => 3,
    "name" => "Sea bream with salad",
    "price" => 16,
    "image" => "./img/firstPlate/producto-3.jpg"
  ],
  [
    "id" => 4,
    "name" => "Teriyaki eel with sesame seeds",
    "price" => 14,
    "image" => "./img/firstPlate/producto-4.jpg"
  ],
  [
    "id" => 5,
    "name" => "Lamb tenderloin",
    "price" => 22,
    "image" => "./img/firstPlate/producto-5.jpg"
  ],
  [
    "id" => 6,
    "name" => "Roasted sea bass with puree",
    "price" => 20,
    "image" => "./img/firstPlate/producto-6.jpg"
  ]
];

// If the first plate id is not set, initialize it with -1
if (!isset($_SESSION['firstSelectedProduct'])) {
  // Inicializamos la variable con el valor -1
  $_SESSION['firstSelectedProduct'] = -1;
}

// If the cart is not set, initialize it
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// If the user select a plate
if (isset($_POST['id'])) {
  // Get the id, name and price of the product
  $id = $_POST['id'];
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  // Save the id of the product in the session
  $_SESSION['firstSelectedProduct'] = $id;
  // Create the product
  $producto = ["id" => $id, "name" => $name, "price" => $price];
  // Add the product to the cart
  $_SESSION['cart']['firstPlate'] = $producto;
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
  </div>
  <div class="title">
    <h1>First Plate</h1>
  </div>
  <div class="arrow__container">
    <a href="secondPlate.php" class="arrow__wrapper">
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
      $buttonText = $_SESSION['firstSelectedProduct'] == $product['id'] ? "<img src='./img/check.svg' alt='Product of plate/>'" : "Añadir";
      echo "<div class='producto__wrapper'>";
      echo "<div class='producto'>";
      echo "<img src='" . $product['image'] . "' alt='Producto'>";
      echo "<h3>" . $product['name'] . "</h3>";
      echo "<p class='producto__precio'>" . $product['price'] . "€</p>";
      echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
      echo "<input type='hidden' name='id' value='" . $product['id'] . "'>";
      echo "<input type='hidden' name='productName' value='" . $product['name'] . "'>";
      echo "<input type='hidden' name='productPrice' value='" . $product['price'] . "'>";
      echo "<button class='producto__btn'>$buttonText</button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
</section>
</body>
</html>