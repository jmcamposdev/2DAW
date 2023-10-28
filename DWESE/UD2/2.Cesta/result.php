<?php
session_start();
// Si no exite el carrito redireccionar el index.php
if (!isset($_SESSION['cart'])) {
  header("Location: index.php");
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
<?php include_once "./assets/header.php"; ?>
<section class="nav__container">
  <div class="arrow__container">
    <a href="extras.php" class="arrow__wrapper">
      <img class="left-arrow" src="./img/arrow.svg" alt="Right Arrow">
      <span>Previous</span>
    </a>
  </div>
  <div class="title">
    <h1>Result</h1>
  </div>
  <div class="arrow__container"></div>
</section>
<section class="result__wrapper">
  <h2>First & Second Plate</h2>
  <table>
    <thead>
    <tr>
      <th></th>
      <th>Product</th>
      <th>Price</th>
      <th>Amount</th>
      <th>SubTotal</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($_SESSION['cart'] as $index => $value) {
      // Si el producto no es extra
      if ($index != "extras") {
        $imgFolder = $index == 'firstPlate' ? 'firstPlate' : 'secondPlate';
        echo "<tr>";
        echo "  <td class='img-row'><img src='./img/{$imgFolder}/producto-{$value['id']}.jpg'/></td>";
        echo "  <td>{$value['name']}</td>";
        echo "  <td>{$value['price']} €</td>";
        echo "  <td>1</td>";
        echo "  <td>{$value['price']} €</td>";
        echo "</tr>";
      }
    }
    ?>
    </tbody>
  </table>

  <h2 class="extra-title"> Extras </h2>
  <table>
    <thead>
    <tr>
      <th></th>
      <th>Product</th>
      <th>Price</th>
      <th>Amount</th>
      <th>SubTotal</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['cart']['extras']) && !empty($_SESSION['cart']['extras'])) {
      foreach ($_SESSION['cart']['extras'] as $value => $extra) {
        // Si el producto no es extra
        $totalPrice = $extra['price'] * $extra['quantity'];
        echo "<tr>";
        echo "  <td class='img-row'><img src='./img/extras/producto-{$extra['id']}.jpg'/></td>";
        echo "  <td>{$extra['name']}</td>";
        echo "  <td>{$extra['price']} €</td>";
        echo "  <td>{$extra['quantity']}</td>";
        echo "  <td>{$totalPrice} €</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No Extras selected</td></tr>";
    }

    ?>
    </tbody>
  </table>

  <table class="total__table">
    <thead>
    <tr>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><?php include "assets/calculateTotal.php" ?></td>
    </tr>
    </tbody>
  </table>
  <form class="clear__session__form" action='assets/clearSession.php' method="POST">
    <button type="submit" name="clearSessionFrom">Clear Order</button>
  </form>

</section>
</body>

</html>