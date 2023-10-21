<?php

class Test extends Dbh {

  /**
   * Gets all users from the database
   */
  public function getUsers() {
    // Create the SQL query
    $sql = "SELECT * FROM USUARIOS";
    // Execute the query and return the results
    $stmt = $this->connect()->query($sql);
    // Fetch the results as an associative array
    while ($row = $stmt->fetch()) {
      echo $row['nombreusuario'] . ' ' . $row['telefono'];
    }
  }


}