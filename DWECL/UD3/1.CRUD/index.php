<?php
  include "includes/class-autoload.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>
<body>
<?php
    $testObj = new Test();
    //$testObj->getUsers();
    $testObj->getUsersStmt('Paco', '666666666');

  ?>
</body>
</html>