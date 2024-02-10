<?php
// Initialize the session
session_start();
// If the second plate is not selected, redirect to the secondPlate.php with an error
if (!isset($_SESSION['secondSelectedProduct']) || $_SESSION['secondSelectedProduct'] == -1) {
  header("Location: secondPlate.php?error=You need to select one plate");
}
// Products
const products = [
  [
    "id" => 1,
    "name" => "Freshly baked bread",
    "price" => 2,
    "image" => "./img/extras/producto-1.jpg"
  ],
  [
    "id" => 2,
    "name" => "Rice with beans",
    "price" => 3,
    "image" => "./img/extras/producto-2.jpg"
  ],
  [
    "id" => 3,
    "name" => "Sauteed vegetables",
    "price" => 4,
    "image" => "./img/extras/producto-3.jpg"
  ],
  [
    "id" => 4,
    "name" => "Baked potatoes",
    "price" => 4,
    "image" => "./img/extras/producto-4.jpg"
  ],
  [
    "id" => 5,
    "name" => "Fresh salad",
    "price" => 6,
    "image" => "./img/extras/producto-5.jpg"
  ],
  [
    "id" => 6,
    "name" => "Pumpkin puree",
    "price" => 5,
    "image" => "./img/extras/producto-6.jpg"
  ]
];


// If the extras selected products is not set, initialize it with an empty array
if (!isset($_SESSION['extrasSelectedProducts'])) {
  // Inicializamos la variable con el valor -1
  $_SESSION['extrasSelectedProducts'] = [];
}

// If the extras cart is not set, initialize it with an empty array
if (!isset($_SESSION['cart']['extras'])) {
  $_SESSION['cart']['extras'] = [];
}

// If the user select a extra
if (isset($_POST['productFormSubmit'])) {
  // Get the id, name and price of the product and initialize the quantity to 1
  $id = $_POST['id'];
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  $quantity = 1;
  // Save the id of the product in the session if it is not already in the array
  if (!in_array($id, $_SESSION['extrasSelectedProducts'])) {
    array_push($_SESSION['extrasSelectedProducts'], $id);
  }
  // Create the product
  $producto = ["id" => intval($id), "name" => $name, "price" => $price, "quantity" => $quantity];
  // Add the product to the cart if it is not already in the array
  if (!in_array($producto['id'], array_column($_SESSION['cart']['extras'], 'id'))) {
    array_push($_SESSION['cart']['extras'], $producto);
  } else { // If the product is already in the array, delete it 
    $key = -1; // The key of the product in the array
    // Get the key of the product in the array
    foreach ($_SESSION['cart']['extras'] as $index => $extra) {
      if ($extra['id'] == $producto['id']) {
        $key = $index;
      }
    }
    // Delete the product from the extras array
    unset($_SESSION['cart']['extras'][$key]);
    // Delete the product from the extras selected products array
    $key = array_search($id, $_SESSION['extrasSelectedProducts']);
    unset($_SESSION['extrasSelectedProducts'][$key]);
  }
}

// If the user add a quantity to the product
if (isset($_POST['quantityFormSubmitPlus'])) {
  // Get the id and the actual quantity of the product
  $productId = $_POST['id'];
  $quantity = $_POST['quantity'];

  // Increase the quantity of the product
  foreach ($_SESSION['cart']['extras'] as $indice => $value) {
    if ($value['id'] == $productId) { // If the product is in the array
      // Increase the quantity of the product
      $_SESSION['cart']['extras'][$indice]['quantity'] = $quantity + 1;
    }
  }
}

// If the user decrease a quantity to the product
if (isset($_POST['quantityFormSubmitMinus'])) {
  // Get the id and the actual quantity of the product
  $productId = $_POST['id'];
  $quantity = $_POST['quantity'];
  // Decrease the quantity of the product if it is not 1
  if ($quantity != 1) {
    foreach ($_SESSION['cart']['extras'] as $indice => $value) {
      if ($value['id'] == $productId) {
        $_SESSION['cart']['extras'][$indice]['quantity'] = $quantity - 1;
      }
    }
  }
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
include_once "./assets/header.php";
?>
<section class="nav__container">
  <div class="arrow__container">
    <a href="secondPlate.php" class="arrow__wrapper">
      <img class="left-arrow" src="./img/arrow.svg" alt="Right Arrow">
      <span>Previous</span>
    </a>
  </div>
  <div class="title">
    <h1>Extras</h1>
  </div>
  <div class="arrow__container">
    <a href="result.php" class="arrow__wrapper">
      <span>Finish</span>
      <img class="right-arrow" src="./img/arrow.svg" alt="Right Arrow">
    </a>
  </div>
</section>
<section class="error_container">
  <?php
  if (isset($_GET['error'])) {
    echo $_GET['error'];
  }
  ?>
</section>
<section class="productos__wrapper">
  <div class="productos__container">
    <?php
    foreach (products as $product) {
      $productQuantity = 1;
      foreach ($_SESSION['cart']['extras'] as $producto => $value) {
        if ($value['id'] == $product['id']) {
          $productQuantity = $value['quantity'];
        }
      }
      $buttonText = in_array($product['id'], $_SESSION['extrasSelectedProducts']) ? "<img alt='Check icon' src='./img/check.svg'/ '>" : "Añadir";
      echo "<div class='producto__wrapper'>";
      echo "  <div class='producto'>";
      echo "    <img src='" . $product['image'] . "' alt='Producto'>";
      echo "    <h3>" . $product['name'] . "</h3>";
      echo "    <p class='producto__precio'>" . $product['price'] . "€</p>";
      echo "    <div class='quantity__container " . (in_array($product['id'], $_SESSION['extrasSelectedProducts']) ? "" : "quantity__container-hidden") . "'>";
      echo "      <form class='quantity__container' action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
      echo '        <button  name="quantityFormSubmitMinus" type="submit" ><svg class="minus" fill="#000000d1" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 12v1h23v-1h-23z"></path></svg></button>';
      echo "        <input type='hidden' name='id' value='" . $product['id'] . "'/>";
      echo "        <input name='quantity' type='number' min='1' max='5' value='$productQuantity'/>";
      echo '        <button name="quantityFormSubmitPlus" type="submit"><svg fill="#000000d1" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 11v-11h1v11h11v1h-11v11h-1v-11h-11v-1h11z"></path></svg></button>';
      echo "      </form>";
      echo "    </div>";
      echo "    <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
      echo "      <input type='hidden' name='id' value='" . $product['id'] . "'/>";
      echo "      <input type='hidden' name='productName' value='" . $product['name'] . "'/>";
      echo "      <input type='hidden' name='productPrice' value='" . $product['price'] . "'/>";
      echo "      <button name='productFormSubmit' class='producto__btn'>$buttonText</button>";
      echo "    </form>";
      echo "  </div>";
      echo "</div>";
    }
    ?>
  </div>
</section>
<!-- Borrar la Sesión -->
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <input type="hidden" name="borrar" value="1">
  <button class="borrar__btn">Borrar</button>
</form>
<?php
if (isset($_POST['borrar'])) {
  if (isset($_SESSION['cart'])) {
    session_destroy();
  }
}
?>
</body>

</html>