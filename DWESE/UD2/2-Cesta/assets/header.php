<header>
  <div class="logo">
    <img src="img/logo.svg" alt="Logo">
    <h1>Restaurant</h1>
  </div>
  <div class="cesta__container">
    <div class="cesta">
      <p>Cesta:</p>
      <span class="cesta__precio">
        <?php
        include "calculateTotal.php";
        ?>
      </span>
    </div>
  </div>
</header>